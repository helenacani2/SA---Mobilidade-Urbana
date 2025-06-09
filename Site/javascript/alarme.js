const image = document.getElementById('zoomable-image');

        image.addEventListener('mousedown', function() {
            this.classList.add('zooming');
        });

        image.addEventListener('mouseup', function() {
            this.classList.remove('zooming');
            this.style.transform = 'scale(1)';
        });

        image.addEventListener('mouseleave', function() {
            this.classList.remove('zooming');
            this.style.transform = 'scale(1)';
        });