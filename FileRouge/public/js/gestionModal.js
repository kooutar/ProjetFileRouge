function toggleResume(cvPath) {
    const modal = document.getElementById('cvModal');
    const iframe = document.getElementById('cvIframe');
    
    iframe.src = cvPath;
    modal.classList.remove('hidden');
    modal.classList.add('fixed', 'inset-0', 'z-50', 'flex');
}

function closeModal() {
    const modal = document.getElementById('cvModal');
    modal.classList.add('hidden');
    modal.classList.remove('fixed', 'inset-0', 'z-50', 'flex');
}


