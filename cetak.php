<!DOCTYPE html>
<html lang="id">
  <head>
    <title>exported project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <link rel="stylesheet" href="assets/kartu/style.css" />
  </head>
  <body>
    <?php 
        include("config/config.php");
        if( !isset($_GET['id']) ){
            header('Location: peserta.php');
        }
        $id = $_GET['id'];

        
        $data = "SELECT a.*, b.nip, b.nama_petugas FROM tbl_peserta a LEFT JOIN tbl_tanda_tangan b 
        on b.id=a.id_tanda_tangan WHERE a.id = $id";
        
        $query = mysqli_query($conn, $data);
        $row = mysqli_fetch_array($query);

        // jika data yang di-edit tidak ditemukan
        if( mysqli_num_rows($query) < 1 ){
            die("data tidak ditemukan...");
      }
    ?>
    <div>
      <link href="assets/kartu/desktop2.css" rel="stylesheet" />

      <div class="desktop2-container">
        <div class="desktop2-desktop2">
          <div class="desktop2-desktop1">
            <div class="desktop2-group7">
              <div class="desktop2-headerdinas">
                <span class="desktop2-text">
                  <span>
                    Jl. Dr. Cipto Mangukusumo No.123 45131 Telp: 0231203622
                  </span>
                </span>
                <span class="desktop2-text02">
                  <span>PEMERINTAH DAERAH KOTA CIREBON</span>
                </span>
                <span class="desktop2-text04">
                  <span>DINAS TENAGA KERJA</span>
                </span>
              </div>
              <span class="desktop2-text06"><span>Kartu AK 1</span></span>
              <div class="desktop2-span1">
                <div class="desktop2-pengantarkerja">
                  <span class="desktop2-text08"><span>NIP. <?php echo $row['nip']; ?></span></span>
                  <span class="desktop2-text10">
                    <span><?php echo $row['nama_petugas']; ?></span>
                  </span>
                  <span class="desktop2-text12">
                    <span>PENGANTAR KERJA</span>
                  </span>
                </div>
                <span class="desktop2-text14"><span>Tata Busana</span></span>
                <span class="desktop2-text16"><span>KETERAMPILAN</span></span>
                <img
                  src="assets/kartu/public/external/svg6810-35sq.svg"
                  alt="SVG6810"
                  class="desktop2-svg"
                />
                <div class="desktop2-group6">
                  <span class="desktop2-text18"><span>TH. 2023</span></span>
                  <div class="desktop2-group5">
                    <span class="desktop2-text20">
                      <span><?php echo $row['pendidikan']; ?></span>
                    </span>
                    <span class="desktop2-text22">
                      <span>Tata Busana</span>
                    </span>
                  </div>
                  <span class="desktop2-text24"><span>SMK</span></span>
                  <span class="desktop2-text26">
                    <span>PENDIDIKAN FORMAL</span>
                  </span>
                </div>
              </div>
              <div class="desktop2-pasphoto">
                <span class="desktop2-text28">
                  <span>TTD Pencari Kerja</span>
                </span>
                <span class="desktop2-text30">
                  <span>
                    <span>PAS</span>
                    <br />
                    <span>PHOTO</span>
                  </span>
                </span>
              </div>
              <div class="desktop2-datapendaftar">
                <div class="desktop2-nama">
                  <span class="desktop2-text35"><span>Nama Lengkap</span></span>
                  <span class="desktop2-text37">:</span>
                  <span class="desktop2-text38">
                    <span><?php echo $row['nama']; ?></span>
                  </span>
                </div>
                <div class="desktop2-tanggallahir">
                  <span class="desktop2-text40">
                    <span>Tempat / Tgl Lahir</span>
                  </span>
                  <span class="desktop2-text42">:</span>
                  <span class="desktop2-text43">
                    <span><?php echo $row['tempat_lahir']; ?> / <?php echo $row['tgl_lahir']; ?></span>
                  </span>
                </div>
                <div class="desktop2-kelamin">
                  <span class="desktop2-text45">
                    <span>Jenis Kelamin</span>
                  </span>
                  <span class="desktop2-text47">:</span>
                  <span class="desktop2-text48"><span><?php echo $row['jk']; ?></span></span>
                </div>
                <div class="desktop2-status">
                  <span class="desktop2-text50"><span>Status</span></span>
                  <span class="desktop2-text52">:</span>
                  <span class="desktop2-text53"><span><?php echo $row['status_kawin']; ?></span></span>
                </div>
                <div class="desktop2-alamat">
                  <span class="desktop2-text55"><span>Alamat</span></span>
                  <span class="desktop2-text57">:</span>
                  <span class="desktop2-text58">
                    <span>
                      <span>
                        <?php echo $row['alamat']; ?>
                      </span>
                      <br />
                      <span></span>
                      <br />
                      <span></span>
                    </span>
                  </span>
                </div>
                <div class="desktop2-notelepon">
                  <span class="desktop2-text65"><span>No. Telp</span></span>
                  <span class="desktop2-text67">:</span>
                  <span class="desktop2-text68"><span><?php echo $row['no_telpon']; ?></span></span>
                </div>
                <div class="desktop2-berlakusampai">
                  <span class="desktop2-text70"><span>Berlaku s.d.</span></span>
                  <span class="desktop2-text72">:</span>
                  <span class="desktop2-text73"><span>24 MEI 2025</span></span>
                </div>
              </div>
              <div class="desktop2-nik">
                <span class="desktop2-text75">
                  <span>No. Induk Kependudukan</span>
                </span>
                <div class="desktop2-kotaknik">
                  <img
                    src="assets/kartu/public/external/rectangle315720-sbqo-200h.png"
                    alt="Rectangle315720"
                    class="desktop2-rectangle31"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle325721-rimh-200h.png"
                    alt="Rectangle325721"
                    class="desktop2-rectangle32"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle335722-skfk-200h.png"
                    alt="Rectangle335722"
                    class="desktop2-rectangle33"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle345723-6ld-200h.png"
                    alt="Rectangle345723"
                    class="desktop2-rectangle34"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle355724-bks-200h.png"
                    alt="Rectangle355724"
                    class="desktop2-rectangle35"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle365725-0fim-200h.png"
                    alt="Rectangle365725"
                    class="desktop2-rectangle36"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle375726-0908-200h.png"
                    alt="Rectangle375726"
                    class="desktop2-rectangle37"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle385727-yhbw-200h.png"
                    alt="Rectangle385727"
                    class="desktop2-rectangle38"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle395728-o5eb-200h.png"
                    alt="Rectangle395728"
                    class="desktop2-rectangle39"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle405729-ugtw-200h.png"
                    alt="Rectangle405729"
                    class="desktop2-rectangle40"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle415730-rzp-200h.png"
                    alt="Rectangle415730"
                    class="desktop2-rectangle41"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle425731-zchk-200h.png"
                    alt="Rectangle425731"
                    class="desktop2-rectangle42"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle435732-tzwt-200h.png"
                    alt="Rectangle435732"
                    class="desktop2-rectangle43"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle445733-hlix-200h.png"
                    alt="Rectangle445733"
                    class="desktop2-rectangle44"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle455734-so2v-200h.png"
                    alt="Rectangle455734"
                    class="desktop2-rectangle45"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle465735-jt39-200h.png"
                    alt="Rectangle465735"
                    class="desktop2-rectangle46"
                  />
                </div>
                <?php $d= $row['nik']; 
                 (explode(" ",$d[0]));
                ?>
              </div>
              <div class="desktop2-nopendaftaran">
                <span class="desktop2-text79">
                  <span>No Pendaftaran Pencari Kerja</span>
                </span>
                <div class="desktop2-kotakpencarikerja">
                  <img
                    src="assets/kartu/public/external/rectangle485738-0k2j-200h.png"
                    alt="Rectangle485738"
                    class="desktop2-rectangle48"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle495739-soy-200h.png"
                    alt="Rectangle495739"
                    class="desktop2-rectangle49"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle505740-3lec-200h.png"
                    alt="Rectangle505740"
                    class="desktop2-rectangle50"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle515741-lx58n-200h.png"
                    alt="Rectangle515741"
                    class="desktop2-rectangle51"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle525742-zms-200h.png"
                    alt="Rectangle525742"
                    class="desktop2-rectangle52"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle535743-6dlq-200h.png"
                    alt="Rectangle535743"
                    class="desktop2-rectangle53"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle545744-q8yi-200h.png"
                    alt="Rectangle545744"
                    class="desktop2-rectangle54"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle555745-c0ip-200h.png"
                    alt="Rectangle555745"
                    class="desktop2-rectangle55"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle565746-4s2j-200h.png"
                    alt="Rectangle565746"
                    class="desktop2-rectangle56"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle575747-elp-200h.png"
                    alt="Rectangle575747"
                    class="desktop2-rectangle57"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle585751-89b9-200h.png"
                    alt="Rectangle585751"
                    class="desktop2-rectangle58"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle595752-ttma-200h.png"
                    alt="Rectangle595752"
                    class="desktop2-rectangle59"
                  />
                  <img
                    src="assets/kartu/public/external/rectangle605753-uh6a-200h.png"
                    alt="Rectangle605753"
                    class="desktop2-rectangle60"
                  />
                </div>

                <div class="desktop2-nopencarikerja">
                <?php $r= $row['no_pendaftaran']; 
                    (explode(" ",$r[0]));
                ?>
                  
                </div>
              </div>
              <img
                src="assets/kartu/public/external/rectangle143-9pd-800w.png"
                alt="Rectangle143"
                class="desktop2-rectangle1"
              />
              <span class="desktop2-text87">
                <span>KARTU TANDA BUKTI PENDAFTARAN PENCARI KERJA</span>
              </span>
              <img
                src="assets/kartu/public/external/logodisnaker942-dmek-200h.png"
                alt="logodisnaker942"
                class="desktop2-logodisnaker"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>window.print();</script>
</html>
