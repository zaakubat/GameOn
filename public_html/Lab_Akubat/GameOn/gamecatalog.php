<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Games Catalog';
include ('./includes/header.php');
?>
<div class="page-header">
    <h1 "style=color: darkslategray"><center> Games Catalog </center> </h1>
</div>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:20px 16px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:20px 16px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-wrg0{font-size:22px;text-align:center;vertical-align:top}
.tg .tg-wv9z{font-size:22px;text-align:center}
.tg .tg-p7ly{font-weight:bold;font-size:20px;text-align:center}
.tg .tg-izya{font-size:18px;text-align:center}
.tg .tg-13pz{font-size:18px;text-align:center;vertical-align:top}
</style>

<div class="well">
<table class="tg">
  <tr>
    <th class="tg-s6z2">      </th>
    <th class="tg-wv9z">Title</th>
    <th class="tg-wv9z">Genre</th>
    <th class="tg-wv9z">Platform</th>
    <th class="tg-wv9z">Rating</th>
    <th class="tg-wv9z">Description<br></th>
    <th class="tg-wrg0">Price</th>
  </tr>
  <tr>
    <td class="tg-s6z2">1.</td>
    <td class="tg-p7ly">Counter Strike : Global Offensive <img src="images/csgo.jpg" alt="csgo" height="150" width="250"></td>
    <td class="tg-izya">FPS</td>
    <td class="tg-izya">PC</td>
    <td class="tg-izya">4.5/5</td>
    <td class="tg-izya">Online FPS Shooting game in which players <br>can take part in two different teams and compete.<br>Whoever reaches a certain amount of round wins<br>the whole match.</td>
    <td class="tg-13pz">$50</td>
  </tr>
  <tr>
    <td class="tg-s6z2">2.</td>
    <td class="tg-p7ly">Need For Speed <img src="images/nfs.jpg" alt="nfs" height="150" width="250"></td>
    <td class="tg-izya">Racing</td>
    <td class="tg-izya">XBOX/PS4/PC</td>
    <td class="tg-izya">4.2/5</td>
    <td class="tg-izya">Racing game which includes players driving their<br>own customized cars. They can modify cars and <br>take them online to race other real world users.</td>
    <td class="tg-13pz">$40</td>
  </tr>
  <tr>
    <td class="tg-s6z2">3.</td>
    <td class="tg-p7ly">Fallout 4 <img src="images/fallout4.jpg" alt="fallout4" height="150" width="250"></td>
    <td class="tg-izya">ARP</td>
    <td class="tg-izya">XBOX/PS4/PC</td>
    <td class="tg-izya">4.9/5</td>
    <td class="tg-izya">Fallout 4 is set in a post-apocalyptic Boston in the<br>year 2287, 210 years after a devastating nuclear <br>war, in which the player character emerges from<br>an underground bunker known as a Vault.</td>
    <td class="tg-13pz">$60</td>
  </tr>
  <tr>
    <td class="tg-s6z2">4.</td>
    <td class="tg-p7ly">Dota 2 <img src="images/dota2.jpg" alt="dota2" height="150" width="250"></td>
    <td class="tg-izya">MOBA</td>
    <td class="tg-izya">PC</td>
    <td class="tg-izya">4.5/5</td>
    <td class="tg-izya">Dota 2 is played in matches between two five-player<br>teams, each of which occupies a stronghold in a <br>corner of the playing field. A team wins by destroying <br>the other side's "Ancient" building, located within <br>the opposing stronghold.</td>
    <td class="tg-13pz">$35</td>
  </tr>
  <tr>
    <td class="tg-s6z2">5.</td>
    <td class="tg-p7ly">ARMA 2 <img src="images/arma2.jpg" alt="arma2" height="150" width="250"></td>
    <td class="tg-izya">FPS</td>
    <td class="tg-izya">PC</td>
    <td class="tg-izya">4/5</td>
    <td class="tg-izya">ARMA 2 is a tactical shooter focused primarily on <br>infantry combat, but significant vehicular and <br>aerial combat elements are present. The player <br>is able to command AI squad members which <br>adds a real-time strategy element to the game.</td>
    <td class="tg-13pz">$13</td>
  </tr>
</table>
</div>
<?php
include ('./includes/footer.html');
?>