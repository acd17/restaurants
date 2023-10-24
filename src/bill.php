<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

session_start();

$cartData = urldecode($_GET['cartData']);
$items = json_decode($cartData, true);

if(!isset($_SESSION['username']) &&
    !isset($_SESSION['password'])){
        echo "<div 
        style ='display: flex;
        justify-content: center;
        align-items: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        '>";
        echo "<div 
        style='
        background-color: #897766;
        border-radius: 20px;
        width: 450px;
        '>";
        echo "<div id='accessLogin' 
        style ='display: flex;
        justify-content: center;
        align-items: center;'>";
        echo "<div 
        style =' 
        color: white;
        font-size: 22px;
        text-align: center;
        margin-top: 10px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        '> 
        You don't have access to this page </div></div>";
        ?>
        <div 
        style ='display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        '>
        <a href="loginregis.php">
            <button 
                style='width: 100px;
                background-color: #4F483F;
                border-radius: 20px;
                color: white;
                font-size: 18px;
                margin-bottom: 10px;
                cursor: pointer'
                >Login</button>
            </a>
            </div>
            </div>
            </div>
        <?php
    }else{
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Bill</title>
            <link rel="stylesheet" href="./bill.css">
        </head>
        <body>
            <div id="wrapper">
            <div id="container">
            <?php 
            $hargaTotalValue = 0;
            echo "<div id='rowKeterangan'>";
            echo "<div id='gambarMenuRow'><b>"; echo "Gambar Menu"; echo "</b></div>";
            echo "<div id='namaMenu'><b>"; echo "Nama Menu"; echo "</b></div>";
            echo "<div id='hargaMenu'><b>"; echo "Harga Menu"; echo "</b></div>";
            echo "</div>";
            echo "<hr>";
            foreach($items as $key => $value){
                echo "<div id='containerBillPesan'>";
                echo "<div id='gambarMenu'>";
                echo '<img id="gambar" src="../src/' . $value['gambar'] . '">';
                echo "</div>";
                echo "<div id='namaItemPesan'><b>" . $value['nama'] . "</b></div>";
                echo "<div id='hargaItemPesan'><b> Rp " . $value['harga'] . "</b></div>";
                $hargaTotalValue += $value['harga'];
                echo "<br />";
                echo "</div>";
                }
            echo "<hr>";
            echo "<div id='wrapperTotalHarga'>";
            echo "<div id='totalHarga'>";
            echo "<b>Total Harga</b>";
            echo "</div>";
            echo "<div id='valueHarga'>";
            echo "<b> Rp " . $hargaTotalValue . "</b>";
            echo "</div>";
            echo "</div>";
            echo "<div id='wrapButtonPesan'>";
            echo "<button id='buttonPesan'>Order</button>" ;
            echo "</div>";
            ?>
            </div>
            </div>

            <!-- <div class="demo">
                <div class="demo__drone-cont demo__drone-cont--takeoff">
                <div class="demo__drone-cont demo__drone-cont--shift-x">
                    <div class="demo__drone-cont demo__drone-cont--landing">
                    <svg viewBox="0 0 136 112" class="demo__drone">
                        <g class="demo__drone-leaving">
                        <path class="demo__drone-arm" d="M52,46 c0,0 -15,5 -15,20 l15,10" />
                        <path class="demo__drone-arm demo__drone-arm--2" d="M52,46 c0,0 -15,5 -15,20 l15,10" />
                        <path class="demo__drone-yellow" d="M28,36 l20,0 a20,9 0,0,1 40,0 l20,0 l0,8 l-10,0 c-10,0 -15,0 -23,10 l-14,0 c-10,-10 -15,-10 -23,-10 l-10,0z" />
                        <path class="demo__drone-green" d="M16,12 a10,10 0,0,1 20,0 l-10,50z" />
                        <path class="demo__drone-green" d="M100,12 a10,10 0,0,1 20,0 l-10,50z" />
                        <path class="demo__drone-yellow" d="M9,8 l34,0 a8,8 0,0,1 0,16 l-34,0 a8,8 0,0,1 0,-16z" />
                        <path class="demo__drone-yellow" d="M93,8 l34,0 a8,8 0,0,1 0,16 l-34,0 a8,8 0,0,1 0,-16z" />
                        </g>
                        <path class="demo__drone-package demo__drone-green" d="M50,70 l36,0 l-4,45 l-28,0z" />
                    </svg>
                    </div>
                </div>
                </div>
                <div class="demo__circle">
                <div class="demo__circle-inner">
                    <svg viewBox="0 0 16 20" class="demo__circle-package">
                    <path d="M0,0 16,0 13,20 3,20z" />
                    </svg>
                    <div class="demo__circle-grabbers"></div>
                </div>
                <svg viewBox="0 0 40 40" class="demo__circle-progress">
                    <path class="demo__circle-progress-line" d="M20,0 a20,20 0 0,1 0,40 a20,20 0 0,1 0,-40" />
                    <path class="demo__circle-progress-checkmark" d="M14,19 19,24 29,14" />
                </svg>
                </div>
                <div class="demo__text-fields">
                <div class="demo__text demo__text--step-0" style="color: black;">Place order</div>
                <div class="demo__text demo__text--step-1">
                    Processing
                    <span class="demo__text-dots"><span>.</span></span>
                </div>
                <div class="demo__text demo__text--step-2">
                    Delivering
                    <span class="demo__text-dots"><span>.</span></span>
                </div>
                <div class="demo__text demo__text--step-3">It's on the way</div>
                <div class="demo__text demo__text--step-4">Delivered</div>
                </div>
                <div class="demo__revert-line"></div> -->
            </div>

        </body>
        
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script>
        const $demo = document.querySelector('.demo');
        let processing = false;

        $demo.addEventListener('click', () => {
        if (processing) return;
        let reverting = false;
        processing = true;
        const $endListener = document.createElement('div');
        $endListener.classList.add('demo-transitionend-listener');
        $demo.appendChild($endListener);
        const layoutTrigger = $demo.offsetTop;
        $demo.classList.add('s--processing');
        
        $endListener.addEventListener('transitionend', () => {
            if (reverting) return;
            reverting = true;
            $demo.classList.add('s--reverting');
        });
        
        setTimeout(() => {
            $demo.removeChild($endListener);
            $demo.classList.remove('s--processing', 's--reverting');
            processing = false;
        }, 10000);
        });
        </script> -->

        </html>
    <?php
    }
?>

