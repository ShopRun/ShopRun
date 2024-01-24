<script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureInfo = document.getElementById('capture-info');

        // Get user media (camera)
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((error) => {
                console.error('Error accessing camera:', error);
            });

        // Function to capture image from the video stream
        function captureImage() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

            // Display captured image on the page
            const imageDataUrl = canvas.toDataURL('image/png');
            captureInfo.innerHTML = `Image captured on ${getCurrentDateTime()}`;
            showCapturedImage(imageDataUrl);
        }

        // Function to display the captured image
        function showCapturedImage(imageDataUrl) {
            const img = new Image();
            img.src = imageDataUrl;
            document.body.appendChild(img);
        }

        // Function to get current date and time
        function getCurrentDateTime() {
            const now = new Date();
            const date = now.toDateString();
            const time = now.toLocaleTimeString();
            return `${date} at ${time}`;
        }
    </script>
</body>
<footer>
    <div class="container">
        <p>&copy; Field Report Live</p>
        </div>
        </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
</footer>
</html>