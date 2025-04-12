<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Section;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class CourseRepository
{
    protected $course;
    protected $section;
    protected $lesson;

    public function __construct(Course $course, Section $section, Lesson $lesson)
    {
        $this->course = $course;
        $this->section = $section;
        $this->lesson = $lesson;
    }

    public function create(array $data)
    {
        // Handle file uploads
        $thumbnailPath = $this->uploadFile($data['thumbnail'], 'courses/thumbnails');
        $previewVideoPath = isset($data['preview_video']) ? $this->uploadFile($data['preview_video'], 'courses/previews') : null;

        // Create course
        $course = $this->course->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'level' => $data['level'],
            'duration' => $data['duration'],
            'price' => $data['price'],
            'discount_price' => $data['discount_price'] ?? null,
            'thumbnail' => $thumbnailPath,
            'preview_video' => $previewVideoPath,
            'user_id' => auth()->id(),
        ]);

        // Create sections and lessons
        if (isset($data['sections'])) {
            foreach ($data['sections'] as $sectionData) {
                $section = $course->sections()->create([
                    'title' => $sectionData['title'],
                    'description' => $sectionData['description'] ?? null,
                ]);

                if (isset($sectionData['lessons'])) {
                    foreach ($sectionData['lessons'] as $lessonData) {
                        $lessonContentPath = $this->uploadFile($lessonData['content'], 'courses/lessons');
                        
                        $section->lessons()->create([
                            'title' => $lessonData['title'],
                            'type' => $lessonData['type'],
                            'content' => $lessonContentPath,
                        ]);
                    }
                }
            }
        }

        return $course;
    }

    protected function uploadFile($file, $path)
    {
        if (!$file) {
            return null;
        }

        return Storage::disk('public')->put($path, $file);
    }

    public function update($id, array $data)
    {
        $course = $this->course->findOrFail($id);

        // Handle file uploads
        if (isset($data['thumbnail'])) {
            Storage::disk('public')->delete($course->thumbnail);
            $data['thumbnail'] = $this->uploadFile($data['thumbnail'], 'courses/thumbnails');
        }

        if (isset($data['preview_video'])) {
            Storage::disk('public')->delete($course->preview_video);
            $data['preview_video'] = $this->uploadFile($data['preview_video'], 'courses/previews');
        }

        $course->update($data);
        return $course;
    }

    public function delete($id)
    {
        $course = $this->course->findOrFail($id);
        
        // Delete associated files
        Storage::disk('public')->delete($course->thumbnail);
        if ($course->preview_video) {
            Storage::disk('public')->delete($course->preview_video);
        }

        // Delete sections and lessons
        foreach ($course->sections as $section) {
            foreach ($section->lessons as $lesson) {
                Storage::disk('public')->delete($lesson->content);
                $lesson->delete();
            }
            $section->delete();
        }

        return $course->delete();
    }

    public function find($id)
    {
        return $this->course->with(['sections', 'sections.lessons'])->findOrFail($id);
    }

    public function all()
    {
        return $this->course->with(['sections', 'sections.lessons'])->get();
    }
} 