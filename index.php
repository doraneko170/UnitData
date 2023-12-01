<style>
  *{margin:0;padding:0}
  body{width:80%;height:80%;margin:5%}
</style>
<body>
  <select id="select-page">
    <option>entryOrbData</option>
  </select>
  <input type="button" value="change" onclick="changePage()">
  <iframe style="width:100%; height:100%" src="entryOrbData.php" id="target"></iframe>
</body>
<script>
  function changePage() {
    var selectPage = document.getElementById('select-page')
    var target = document.getElementById('target')
    target.src = selectPage.value + '.php'
  }
</script>