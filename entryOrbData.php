<?php
$FILE_URL = "./OrbData.json";
if (isset($_POST["data"])) {
  if (file_get_contents($FILE_URL, true))
    foreach (json_decode(file_get_contents($FILE_URL), true) as $subJSON) {
      $json[] = $subJSON;
    }
  $json[] = json_decode($_POST["data"], true);
  file_put_contents($FILE_URL, json_encode($json));
}

?>

<form action="./entryOrbData.php" method="post" name="form1" id="form1" onsubmit="pushData()">
  <table>
    <tr>
      <td>オーブ名</td>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td>ID</td>
      <td><input type="number" name="id" id="id"></td>
    </tr>
    <tr>
      <td>コスト</td>
      <td><input type="number" name="cost" id="cost"></td>
    </tr>
    <tr>
      <td>レアリティ</td>
      <td>
        <label for="r-ur"><input id="r-ur" name="rarity" type="radio">UR</label>
        <label for="r-sr"><input id="r-sr" name="rarity" type="radio">SR</label>
        <label for="r-r"><input id="r-r" name="rarity" type="radio">R</label>
        <label for="r-n"><input id="r-n" name="rarity" type="radio">N</label>
      </td>
    </tr>
    <tr>
      <td>種族</td>
      <td>
        <label for="k-hmn"><input id="k-hmn" name="kind" type="radio">人</label>
        <label for="k-god"><input id="k-god" name="kind" type="radio">神</label>
        <label for="k-dvl"><input id="k-dvl" name="kind" type="radio">魔</label>
      </td>
    </tr>
    <tr>
      <td>前衛スキル</td>
      <td>
        <label for="f-atk"><input id="f-atk" name="fskill" type="checkbox">攻撃</label>
        <label for="f-mgk"><input id="f-mgk" name="fskill" type="checkbox">魔法</label>
        <label for="f-hlt"><input id="f-hlt" name="fskill" type="checkbox">回復</label>
        <label for="f-psv"><input id="f-psv" name="fskill" type="checkbox">特性</label>
      </td>
    </tr>
    <tr>
      <td>後衛スキル</td>
      <td>
        <label for="b-atk"><input id="b-atk" name="bskill" type="checkbox">攻撃</label>
        <label for="b-mgk"><input id="b-mgk" name="bskill" type="checkbox">遠距離</label>
        <label for="b-hlt"><input id="b-hlt" name="bskill" type="checkbox">応援</label>
        <label for="b-psv"><input id="b-psv" name="bskill" type="checkbox">特性</label>
      </td>
    </tr>
    <tr>
      <td>未進化継承枠</td>
      <td>
        <label for="p-ihf"><input id="p-ihf" name="pinheritance" type="checkbox">前衛</label>
        <label for="p-ihb"><input id="p-ihb" name="pinheritance" type="checkbox">後衛</label>
        <label for="p-ihp"><input id="p-ihp" name="pinheritance" type="checkbox">特性</label>
      </td>
    </tr>
    <tr>
      <td>限界突破継承枠</td>
      <td>
        <label for="e-ihf"><input id="e-ihf" name="einheritance" type="checkbox">前衛</label>
        <label for="e-ihb"><input id="e-ihb" name="einheritance" type="checkbox">後衛</label>
        <label for="e-ihp"><input id="e-ihp" name="einheritance" type="checkbox">特性</label>
      </td>
    </tr>
  </table>
  <input type="submit" name="submit" value="登録">
  <input type="hidden" id="data" name="data">
</form>
<?php
if (isset($_POST['data'])) {
  print_r($_POST['data']);
}
?>

<script>
  function pushData() {
    var name = document.getElementById('name')
    var id = document.getElementById('id')
    var cost = document.getElementById('cost')
    var rarity = document.getElementsByName('rarity')
    var kind = document.getElementsByName('kind')
    var fSkill = document.getElementsByName('fskill')
    var bSkill = document.getElementsByName('bskill')
    var pInheritance = document.getElementsByName('pinheritance')
    var eInheritance = document.getElementsByName('einheritance')
    var data = document.getElementById('data')
    var kindValue, rarityValue
    var fSkillArray = [], bSkillArray = []
    var pInheritanceArray = [], eInheritanceArray = []
    for (var i = 0; i < rarity.length; i++)
      if (rarity.item(i).checked)
        rarityValue = rarity.item(i).value
    for (var i = 0; i < kind.length; i++)
      if (kind.item(i).checked)
        kindValue = kind.item(i).value
    for (var i = 0; i < fSkill.length; i++)
      if (fSkill.item(i).checked)
        fSkillArray.push(i)
    for (var i = 0; i < bSkill.length; i++)
      if (bSkill.item(i).checked)
        bSkillArray.push(i)
    for (var i = 0; i < pInheritance.length; i++)
      if (pInheritance.item(i).checked)
        pInheritanceArray.push(i)
    for (var i = 0; i < eInheritance.length; i++)
      if (eInheritance.item(i).checked)
        eInheritanceArray.push(i)
    var pushData = {
      name: name.value,
      id: id.value,
      cost: cost.value,
      rarity: rarityValue,
      kind: kindValue,
      fSkill: fSkillArray,
      bSkill: bSkillArray,
      pInheritance: pInheritanceArray,
      eInheritance: eInheritanceArray
    }
    var pushDataJSON = JSON.stringify(pushData)
    data.value = pushDataJSON
  }

</script>