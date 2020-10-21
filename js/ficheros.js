
/* show file value after file select */
document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("myInput").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
document.querySelector('#myInput2').addEventListener('change',function(e){
  var fileName = document.getElementById("myInput2").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
document.querySelector('#myInput3').addEventListener('change',function(e){
  var fileName = document.getElementById("myInput3").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
