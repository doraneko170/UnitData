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
      <form id="rarity">
        <label for="r-ur"><input id="r-ur" name="rarity" type="radio">UR</label>
        <label for="r-sr"><input id="r-sr" name="rarity" type="radio">SR</label>
        <label for="r-r"><input id="r-r" name="rarity" type="radio">R</label>
        <label for="r-n"><input id="r-n" name="rarity" type="radio">N</label>
      </form>
    </td>
  </tr>
  <tr>
    <td>種族</td>
    <td>
      <form id="kind">
        <label for="k-hmn"><input id="k-hmn" name="kind" type="radio">人</label>
        <label for="k-god"><input id="k-god" name="kind" type="radio">神</label>
        <label for="k-dvl"><input id="k-dvl" name="kind" type="radio">魔</label>
      </form>
    </td>
  </tr>
  <tr>
    <td>前衛スキル</td>
    <td>
      <form id="f-skill">
        <label for="f-atk"><input id="f-atk" name="fskill" type="checkbox">攻撃</label>
        <label for="f-mgk"><input id="f-mgk" name="fskill" type="checkbox">魔法</label>
        <label for="f-hlt"><input id="f-hlt" name="fskill" type="checkbox">回復</label>
        <label for="f-psv"><input id="f-psv" name="fskill" type="checkbox">特性</label>
      </form>
    </td>
  </tr>
  <tr>
    <td>後衛スキル</td>
    <td>
      <form id="b-skill">
        <label for="b-atk"><input id="b-atk" name="bskill" type="checkbox">攻撃</label>
        <label for="b-mgk"><input id="b-mgk" name="bskill" type="checkbox">遠距離</label>
        <label for="b-hlt"><input id="b-hlt" name="bskill" type="checkbox">応援</label>
        <label for="b-psv"><input id="b-psv" name="bskill" type="checkbox">特性</label>
      </form>
    </td>
  </tr>
  <tr>
    <td>未進化継承枠</td>
    <td>
      <form id="p-inheritance">
        <label for="p-ihf"><input id="p-ihf" name="pinheritance" type="checkbox">前衛</label>
        <label for="p-ihb"><input id="p-ihb" name="pinheritance" type="checkbox">後衛</label>
        <label for="p-ihp"><input id="p-ihp" name="pinheritance" type="checkbox">特性</label>
      </form>
    </td>
  </tr>
  <tr>
    <td>限界突破継承枠</td>
    <td>
      <form id="e-inheritance">
        <label for="e-ihf"><input id="e-ihf" name="einheritance" type="checkbox">前衛</label>
        <label for="e-ihb"><input id="e-ihb" name="einheritance" type="checkbox">後衛</label>
        <label for="e-ihp"><input id="e-ihp" name="einheritance" type="checkbox">特性</label>
      </form>
    </td>
  </tr>
</table>
<input type="file" id="file"><br>
<input type="button" onclick="pushData()" value="登録">

<script>
  var json
  function pushData() {
    var [file] = document.getElementById('file').files
    var reader = new FileReader()
    reader.addEventListener(
      "load", () => {
        var inputDataJSON = reader.result
        // var inputData = JSON.parse(inputDataJSON)
        // console.log(inputData)

        var name = document.getElementById('name')
        var id = document.getElementById('id')
        var cost = document.getElementById('cost')
        var rarity = document.getElementById('rarity').rarity
        var kind = document.getElementById('kind').kind
        var fSkill = document.getElementById('f-skill').fskill
        var bSkill = document.getElementById('b-skill').bskill
        var pInheritance = document.getElementById('p-inheritance').pinheritance
        var eInheritance = document.getElementById('e-inheritance').einheritance
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
        json = pushDataJSON
      }
    )
    if (file)
      reader.readAsText(file)
  }

</script>