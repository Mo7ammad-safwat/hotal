document.addEventListener("DOMContentLoaded", function() {
    const bookingForm = document.querySelector('.booking-form form');
    bookingForm.addEventListener('submit', function(e) {
        const checkinDate = new Date(document.getElementById('checkin-date').value);
        const checkoutDate = new Date(document.getElementById('checkout-date').value);
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Reset time to 00:00:00

        if (checkinDate >= checkoutDate) {
            alert('تاريخ الوصول يجب أن يكون قبل تاريخ المغادرة.');
            e.preventDefault(); // Prevent form submission
        } else if (checkinDate < today) {
            alert('تاريخ الوصول يجب أن يكون تاريخًا في المستقبل.');
            e.preventDefault(); // Prevent form submission
        }
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const greeting = document.querySelector('.greeting');
    const now = new Date();
    const hour = now.getHours();

    if (hour < 12) {
        greeting.textContent = 'صباح الخير ومرحبًا بك في فندقنا الجميل!';
    } else if (hour < 18) {
        greeting.textContent = 'طاب يومك ومرحبًا بك في فندقنا الجميل!';
    } else {
        greeting.textContent = 'مساء الخير ومرحبًا بك في فندقنا الجميل!';
    }
});



document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.querySelector('.contact-form form');
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the actual form submission
        alert('شكرًا لتواصلك معنا. سنعود إليك في أقرب وقت ممكن.');
        // Here you would normally handle the form submission (e.g., using AJAX)
    });
});
