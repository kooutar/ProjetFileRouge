 // Tab switching functionality
 document.addEventListener('DOMContentLoaded', function() {
    const categoriesTab = document.getElementById('categoriesTab');
    const tagsTab = document.getElementById('tagsTab');
    const categoriesSection = document.getElementById('categoriesSection');
    const tagsSection = document.getElementById('tagsSection');
    
    categoriesTab.addEventListener('click', function() {
        // Show categories, hide tags
        categoriesSection.classList.remove('hidden');
        tagsSection.classList.add('hidden');
        
        // Update tab styling
        categoriesTab.classList.add('border-custom-purple', 'text-custom-purple');
        categoriesTab.classList.remove('border-transparent', 'text-gray-500');
        
        tagsTab.classList.remove('border-custom-purple', 'text-custom-purple');
        tagsTab.classList.add('border-transparent', 'text-gray-500');
    });
    
    tagsTab.addEventListener('click', function() {
        // Show tags, hide categories
        tagsSection.classList.remove('hidden');
        categoriesSection.classList.add('hidden');
        
        // Update tab styling
        tagsTab.classList.add('border-custom-purple', 'text-custom-purple');
        tagsTab.classList.remove('border-transparent', 'text-gray-500');
        
        categoriesTab.classList.remove('border-custom-purple', 'text-custom-purple');
        categoriesTab.classList.add('border-transparent', 'text-gray-500');
    });
});