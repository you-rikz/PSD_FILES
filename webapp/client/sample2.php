<link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">


<button class="sweet-confirm2" >Hello Button</button>


<script src="../sweetalert/dist/sweetalert2.min.js"></script>
<script>
document.querySelector(".token-auto").onclick = function() {
    
  let timerInterval
  Swal.fire({
    title: 'Check you email',
    html: 'The token has been sent to your email.',
    timer: 2000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer')
    }
  })


}
</script> 