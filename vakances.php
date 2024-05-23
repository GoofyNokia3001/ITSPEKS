<?php
    $page = "vakances";
    require "header.php";
?>
    <div class="square">
        <div class="filter radius">
            <form method="POST">
                <input type="text" placeholder="Uzņēmums" class="radius">
                <select name="atrasanasVieta" class="radius">
                    <option value="liepaja">Liepāja</option>
                    <option value="riga">Rīga</option>
                    <option value="ventspils">Ventspils</option>
                </select>
                <select name="amats" class="radius">
                    <option value="programmetajs">Programmētājs</option>
                    <option value="testetajs">Testētājs</option>
                </select>
                <input type="number" placeholder="Algas diapazons sākums" class="radius">
                <input type="number" placeholder="Algas diapazons beigums" class="radius">
                <div class="radio">
                    <input type="radio" id="html" name="kartosana" value="aug">
                    <label>Augošā</label>
                </div>
                <div class="radio">
                    <input type="radio" name="kartosana" value="dil">
                    <label id="dil">Disltošā</label>
                </div>
                <button type="submit" class="btn">Meklēt</button>
            </form>
        </div>
        <div class="sarakstsArVakancem">
            <div class="ieraksts box radius shadow">
                <img src="https://www.ldz.lv/sites/all/themes/ldzmain/images/logo/ldz.png">
                <h2>INFORMĀCIJAS SISTĒMU PROGRAMMĒTĀJS</h2>
                <h3>Valsts akciju sabiedrība "Latvijas dzelzceļš"</h3>
                <button class="toggle-btn" onclick="toggleContent(this)">Vairāk</button>
                <div class="content">
                    <h4>LATVIJA, Vilhelma Purvīša iela 21, Rīga</h4>
                    <p>Ja esi Full-Stack JavaScript programmētājs ar attīstītu loģisko domāšanu, spēju sistematizēt un analizēt lielus informācijas apjomus, kā arī prasmi veikt risinājumu izstrādi un uzlabošanu, piesakies!</p>
                    <p><span>Prasmes:</span></p>
                    <ul>
                        <li>Augstāka izglītība IT jomā</li>
                        <li>Vismaz 2 gadu pieredzi IT sfērā: sistēmu izstrādāšanā un uzturēšanā</li>
                        <li>Pieredzi web izstrādē darbā ar JavaScript, Node.js</li>
                        <li>Piereidzi darbā ar Front-End ietvaru: Vue.js (vai līdzvērtīgiem)</li>
                        <li>Pieredzi darbā ar SQL pieprasījumiem, SQL objektiem (tables, views, stored, procedures), Git, Linux</li>
                    </ul>
                    <p><span>Valodas:</span></p>
                    <ul>
                        <li>Valsts valodas prasmi augstākajā līmenī</li>
                        <li>Angļu valodas prasmes vidējā līmenī</li>
                    </ul>
                    <p><span>2700 EUR</span></p>
                    <p>Darbinieka amats uz nenoteiktu laiku</p>
                    <p>Sanita Batarāga, datuaizsardziba@ldz.lv, +371 12345678</p>
                    <a href="pieteikums.php" class="btn">Pieteikties</a>
                </div>
            </div>
            <div class="ieraksts box radius shadow">
                <h2>Informācijas sistēmu TESTĒTĀJS</h2>
                <h3>SIA "Sinatrade"</h3>
                <button class="toggle-btn" onclick="toggleContent(this)">Vairāk</button>
                <div class="content">
                    <h4>LATVIJA, Rītupes iela 21 - 2, Rīga</h4>
                    <p>Aicinām pievienoties mūsu komandai Informācijas sistēmu testētāju/-i, darbam ar Āzijas reģiona klientiem. Darbs ar klientu bāzi.</p>
                    <p><span>Prasmes:</span></p>
                    <ul>
                        <li>5 gadu pieredze</li>
                        <li>Pārzināt Microsoft Word, Excel, Outlook</li>
                        <li>B kategorijas autovadītāja apliecība (vēlama)</li>
                    </ul>
                    <p><span>Valodas:</span></p>
                    <ul>
                        <li>Arābu valodas zināšanas (dalība starptautiskajās izstādēs)</li>
                        <li>Angļu valodas zināšanas</li>
                    </ul>
                    <p><span>1600 EUR</span></p>
                    <p>Uzņēmuma līgums</p>
                    <p>Renārs Būmanis, info@sinatrade.lv, +371 87654321</p>
                    <a href="pieteikums.php" class="btn">Pieteikties</a>
                </div>
            </div>
        </div>
    </div>
    
<?php
    require "footer.php";
?>