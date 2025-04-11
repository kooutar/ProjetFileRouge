 // Simple mobile menu toggle
 document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.bg-white.border-r');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    
    if (mobileMenuBtn && sidebar) {
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-0');
            sidebar.classList.toggle('z-50');
        });
    }
});