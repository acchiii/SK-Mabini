
 /* <div id="toastContainer"
    class="fixed top-20 left-1/2 transform -translate-x-1/2 z-[9999] space-y-3 flex flex-col items-center"></div>
  <script src="../../libarary/toast.js"></script>
  <?php
    if (isset($_GET['msg']) && isset($_GET['msgtype'])) {
        $msg = htmlspecialchars(base64_decode($_GET['msg']));
        $msgtype = htmlspecialchars(base64_decode($_GET['msgtype']));
        echo "<script>showToast('$msg', '$msgtype');</script>";
    }
  ?>*/
  
    function showToast(message, type = 'error') {
      const toastContainer = document.getElementById('toastContainer');
      if (!toastContainer) return;

      const colors = {
        success: 'bg-green-600',
        error: 'bg-red-600',
        warning: 'bg-yellow-600'
      };

      const toast = document.createElement('div');
      toast.className = `text-white px-4 py-2 rounded-lg shadow-md flex items-center justify-between transition-opacity duration-500 opacity-0 ${colors[type] || colors.error}`;
      toast.innerHTML = `
    <span class="font-medium">${message}</span>
  `;

      toastContainer.appendChild(toast);

      // Fade in
      setTimeout(() => toast.classList.remove('opacity-0'), 50);

      // Remove after 3 seconds
      setTimeout(() => {
        toast.classList.add('opacity-0');
        setTimeout(() => toast.remove(), 500);
      }, 3000);
    }
    // Example usage:
    // showToast('This is a success message!', 'success');
    // showToast('This is an error message!', 'error');
    // showToast('This is a warning message!', 'warning');
