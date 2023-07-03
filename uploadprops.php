<?php
// session_start();
include('controller/session.php');
// include('controller/dbc.php');
$dbs = new Dbc();
$page = '';
$display = 'display-none';

$errorMessage = '';
$alertColor = 'danger';

if (isset($_FILES['featuredimage'])) {
    $propertyid = 'props' . rand(1000, 10000);
    // $user_id = 'user_id' . rand(1000, 10000);
    $propertytitle = $dbs->test_input($_POST['propertytitle']);
    $propertyprice = $dbs->test_input($_POST['propertyprice']);
    $area_location = $dbs->test_input($_POST['area_location']);
    $address = $dbs->test_input($_POST['address']);
    $city = $dbs->test_input($_POST['city']);
    $state = $dbs->test_input($_POST['state']);
    $longtitude = $dbs->test_input($_POST['longtitude']);
    $langtitude = $dbs->test_input($_POST['langtitude']);
    $detailedinfo = $dbs->test_input($_POST['detailedinfo']);
    $propertyCategory = $dbs->test_input($_POST['propertyCategory']);
    $featuredimage = $_FILES['featuredimage']['name'];
    $galleryimage = $_FILES['galleryimage']['name'];
    $galleryimageid = 'img' . rand(1000, 10000);
    $status = 'pending';
    $propertyfeatures = ' ';
    $postalcode = ' ';
    $agent_name = ' ';
    $agent_email = ' ';
    $agent_phone = ' ';

    if (!empty($propertyCategory && $propertyid && $propertytitle && $propertyprice && $area_location && $address && $city && $state && $longtitude && $langtitude && $detailedinfo && $status)) {
        $sql = $dbs->UploadProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimageid, $status, $propertyCategory);
        if ($sql) {
            $targetDirectory = "featuredGallery/";
            $targetFile = $targetDirectory . basename($_FILES["featuredimage"]["name"]);
            if (move_uploaded_file($_FILES["featuredimage"]["tmp_name"], $targetFile)) {
                $display = '';

                $errorMessage = "File uploaded successfully.";
            } else {
                $display = '';

                $errorMessage = "File upload failed.";
            }

            $targetDirectory = 'galleryImage/';

            // Iterate through the uploaded files
            for ($i = 0; $i < count($_FILES['galleryimage']['name']); $i++) {
                $filename = $_FILES['galleryimage']['name'][$i];
                $tempFilePath = $_FILES['galleryimage']['tmp_name'][$i];
                $targetFilePath = $targetDirectory . $filename;

                // Move the temporary file to the target directory
                $sql = $dbs->multiImage($galleryimageid, $filename);
                if (move_uploaded_file($tempFilePath, $targetFilePath) && $sql) {
                    $display = '';
                    $alertColor = 'success';
                    $errorMessage = "Uploaded successfully.<br>";
                    // $errorMessage = "File $filename uploaded successfully.<br>";
                } else {
                    $display = '';

                    $errorMessage = "Error uploading file $filename.<br>";
                }
            }
        } else {
            $display = '';

            $errorMessage = "Error Submit Form.<br>";
        }


    } else {
        $display = '';

        $errorMessage = 'Form Not Completely Filled';
    }



}
if (isset($_SESSION['useremail'])) {

    $user_email = $_SESSION['useremail'];
    $UsersData = $dbs->currentUser($user_email);
    foreach ($UsersData as $values) {
        $user_role = $values['user_role'];
        // $hashpass = $values['hashpass'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Distress Property Market - Upload Property</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">
    <!-- <link href="assets/css/nice-select.css" rel="stylesheet"> -->
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/dropify-master/dropify-master/dist/css/dropify.min.css">
<!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->
<!-- Include Dropzone.js CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">

<!-- Include Dropzone.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>





</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <!-- <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="far fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                        <span data-text-preloader="D" class="letters-loading">
                                D
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader=" " class="letters-loading">
                                &nbsp;&nbsp;&nbsp;
                            </span>
                            <span data-text-preloader="p" class="letters-loading">
                                P
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="0" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="p" class="letters-loading">
                                p
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="y" class="letters-loading">
                                y
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- preloader end -->


        <!-- switcher menu -->
       
        <!-- end switcher menu -->


        <!-- main header -->
        <?php include('include/header2.php') ?>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>

        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>My Profile</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>My Profile</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- myprofile-section -->
        <section class="myprofile-section sec-pad">
            <div class="auto-container">
                <div class="title">
                    <h3>Submit Property</h3>
                    <div class="alert alert-<?php echo $alertColor;
                    echo $display; ?> " role="alert">
                        <?= $errorMessage ?>
                    </div>

                </div>
                <div class="tabs-box">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1"><span>1</span>General Information</li>
                        <!-- <li class="tab-btn" data-tab="#tab-2"><span>2</span>Gallery</li>
                        <li class="tab-btn" data-tab="#tab-3"><span>3</span>Property Details</li>
                        <li class="tab-btn" data-tab="#tab-4"><span>4</span>Location</li>
                        <li class="tab-btn" data-tab="#tab-5"><span>5</span>Agent Info</li> -->
                    </ul>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="tabs-content">

                            <div class="tab active-tab" id="tab-1">
                                <div class="general-information">
                                    <h4><i class="icon-42"></i>General Information:</h4>
                                    <div class="inner-box default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Title</label>
                                                    <input type="text" name="propertytitle"
                                                        placeholder="Property Title">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <label>Property Category</label>
                                                <div class="field-input">
                                                    <select class="form-control" name="propertyCategory">
                                                        <option value="Distress Properties">Distress Properties
                                                        </option>
                                                        <option value="Land">Land</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Price</label>
                                                    <input type="number" name="propertyprice"
                                                        placeholder="Property Price">

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Detailed Information</label>
                                                    <div class="field-input">
                                                        <textarea placeholder="Detailed Info"
                                                            name="detailedinfo"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Longitude</label>
                                                    <input type="text" name="longtitude" placeholder="-205.421560">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Latitude</label>
                                                    <input type="text" name="langtitude" placeholder="32.963381">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>City</label>
                                                    <div class="select-box" >


                                                        <?php
                                                        // Abia State
                                                        $city_names = array(
                                                            "Aba",
                                                            "Amaigbo",
                                                            "Arochukwu",
                                                            "Bende",
                                                            "Ohafia-Ifigh",
                                                            "Umuahia",
                                                            "Ganye",
                                                            "Gombi",
                                                            "Holma",
                                                            "Jimeta",
                                                            "Madagali",
                                                            "Mayo-Belwa",
                                                            "Mubi",
                                                            "Ngurore",
                                                            "Numan",
                                                            "Toungo",
                                                            "Yola",
                                                            "Eket",
                                                            "Esuk Oron",
                                                            "Ikot Ekpene",
                                                            "Itu",
                                                            "Uyo",
                                                            "Agulu",
                                                            "Atani",
                                                            "Awka",
                                                            "Enugu-Ukwu",
                                                            "Igbo-Ukwu",
                                                            "Ihiala",
                                                            "Nkpor",
                                                            "Nnewi",
                                                            "Onitsha",
                                                            "Ozubulu",
                                                            "Uga",
                                                            "Uruobo-Okija",
                                                            "Azare",
                                                            "Bauchi",
                                                            "Boi",
                                                            "Bununu",
                                                            "Darazo",
                                                            "Dass",
                                                            "Dindima",
                                                            "Disina",
                                                            "Gabarin",
                                                            "Gwaram",
                                                            "Kari",
                                                            "Lame",
                                                            "Lere",
                                                            "Madara",
                                                            "Misau",
                                                            "Sade",
                                                            "Yamrat",
                                                            "Yanda Bayo",
                                                            "Yuli",
                                                            "Zadawa",
                                                            "Zalanga",
                                                            "Amassoma",
                                                            "Twon-Brass",
                                                            "Yenagoa",
                                                            "Aliade",
                                                            "Boju",
                                                            "Igbor",
                                                            "Makurdi",
                                                            "Ochobo",
                                                            "Otukpa",
                                                            "Takum",
                                                            "Ugbokpo",
                                                            "Yandev",
                                                            "Zaki Biam",
                                                            "Bama",
                                                            "Benisheikh",
                                                            "Biu",
                                                            "Bornu Yassu",
                                                            "Damasak",
                                                            "Damboa",
                                                            "Dikwa",
                                                            "Gamboru",
                                                            "Gwoza",
                                                            "Kukawa",
                                                            "Magumeri",
                                                            "Maiduguri",
                                                            "Marte",
                                                            "Miringa",
                                                            "Monguno",
                                                            "Ngala",
                                                            "Shaffa",
                                                            "Shani",
                                                            "Tokombere",
                                                            "Uba",
                                                            "Wuyo",
                                                            "Yajiwa",
                                                            "Akankpa",
                                                            "Calabar",
                                                            "Gakem",
                                                            "Ikang",
                                                            "Ugep",
                                                            "Abraka",
                                                            "Agbor",
                                                            "Asaba",
                                                            "Bomadi",
                                                            "Burutu",
                                                            "Kwale",
                                                            "Obiaruku",
                                                            "Ogwashi-Uku",
                                                            "Orerokpe",
                                                            "Patani",
                                                            "Sapele",
                                                            "Ughelli",
                                                            "Umunede",
                                                            "Warri",
                                                            "Abakaliki",
                                                            "Afikpo",
                                                            "Effium",
                                                            "Ezza-Ohu",
                                                            "Isieke",
                                                            "Agenebode",
                                                            "Auchi",
                                                            "Benin City",
                                                            "Ekpoma",
                                                            "Igarra",
                                                            "Illushi",
                                                            "Siluko",
                                                            "Ubiaja",
                                                            "Uromi",
                                                            "Ado-Ekiti",
                                                            "Aramoko-Ekiti",
                                                            "Efon-Alaaye",
                                                            "Emure-Ekiti",
                                                            "Ifaki",
                                                            "Igbara-Odo",
                                                            "Igede-Ekiti",
                                                            "Ijero-Ekiti",
                                                            "Ikere-Ekiti",
                                                            "Ipoti",
                                                            "Ise-Ekiti",
                                                            "Oke Ila",
                                                            "Omuo-Ekiti",
                                                            "Adani",
                                                            "Ake-Eze",
                                                            "Aku",
                                                            "Amagunze",
                                                            "Awgu",
                                                            "Eha Amufu",
                                                            "Enugu",
                                                            "Enugu-Ezike",
                                                            "Ete",
                                                            "Ikem",
                                                            "Mberubu",
                                                            "Nsukka",
                                                            "Obolo-Eke (1)",
                                                            "Opi",
                                                            "Udi",
                                                            "Abuja",
                                                            "Kuje",
                                                            "Kwali",
                                                            "Madala",
                                                            "Akko",
                                                            "Bara",
                                                            "Billiri",
                                                            "Dadiya",
                                                            "Deba",
                                                            "Dukku",
                                                            "Garko",
                                                            "Gombe",
                                                            "Hinna",
                                                            "Kafarati",
                                                            "Kaltungo",
                                                            "Kumo",
                                                            "Nafada",
                                                            "Pindiga",
                                                            "Iho",
                                                            "Oguta",
                                                            "Okigwe",
                                                            "Orlu",
                                                            "Orodo",
                                                            "Owerri",
                                                            "Babura",
                                                            "Birnin Kudu",
                                                            "Birniwa",
                                                            "Dutse",
                                                            "Gagarawa",
                                                            "Gumel",
                                                            "Gwaram",
                                                            "Hadejia",
                                                            "Kafin Hausa",
                                                            "Kazaure",
                                                            "Kiyawa",
                                                            "Mallammaduri",
                                                            "Ringim",
                                                            "Samamiya",
                                                            "Anchau",
                                                            "Burumburum",
                                                            "Dutsen Wai",
                                                            "Hunkuyi",
                                                            "Kachia",
                                                            "Kaduna",
                                                            "Kafanchan",
                                                            "Kagoro",
                                                            "Kajuru",
                                                            "Kujama",
                                                            "Lere",
                                                            "Mando",
                                                            "Saminaka",
                                                            "Soba",
                                                            "Sofo-Birnin-Gwari",
                                                            "Zaria",
                                                            "Dan Gora",
                                                            "Gaya",
                                                            "Kano",
                                                            "Danja",
                                                            "Dankama",
                                                            "Daura",
                                                            "Dutsin-Ma",
                                                            "Funtua",
                                                            "Gora",
                                                            "Jibia",
                                                            "Jikamshi",
                                                            "Kankara",
                                                            "Katsina",
                                                            "Mashi",
                                                            "Ruma",
                                                            "Runka",
                                                            "Wagini",
                                                            "Argungu",
                                                            "Bagudo",
                                                            "Bena",
                                                            "Bin Yauri",
                                                            "Birnin Kebbi",
                                                            "Dabai",
                                                            "Dakingari",
                                                            "Gulma",
                                                            "Gwandu",
                                                            "Jega",
                                                            "Kamba",
                                                            "Kangiwa",
                                                            "Kende",
                                                            "Mahuta",
                                                            "Maiyama",
                                                            "Shanga",
                                                            "Wasagu",
                                                            "Zuru",
                                                            "Abocho",
                                                            "Adoru",
                                                            "Ankpa",
                                                            "Bugana",
                                                            "Dekina",
                                                            "Egbe",
                                                            "Icheu",
                                                            "Idah",
                                                            "Isanlu-Itedoijowa",
                                                            "Kabba",
                                                            "Koton-Karfe",
                                                            "Lokoja",
                                                            "Ogaminana",
                                                            "Ogurugu",
                                                            "Okene",
                                                            "Ajasse Ipo",
                                                            "Bode Saadu",
                                                            "Gwasero",
                                                            "Ilorin",
                                                            "Jebba",
                                                            "Kaiama",
                                                            "Lafiagi",
                                                            "Offa",
                                                            "Okuta",
                                                            "Omu-Aran",
                                                            "Patigi",
                                                            "Suya",
                                                            "Yashikera",
                                                            "Apapa",
                                                            "Badagry",
                                                            "Ebute Ikorodu",
                                                            "Ejirin",
                                                            "Epe",
                                                            "Ikeja",
                                                            "Lagos",
                                                            "Makoko",
                                                            "Buga",
                                                            "Doma",
                                                            "Keffi",
                                                            "Lafia",
                                                            "Nasarawa",
                                                            "Wamba",
                                                            "Auna",
                                                            "Babana",
                                                            "Badeggi",
                                                            "Baro",
                                                            "Bokani",
                                                            "Duku",
                                                            "Ibeto",
                                                            "Konkwesso",
                                                            "Kontagora",
                                                            "Kusheriki",
                                                            "Kuta",
                                                            "Lapai",
                                                            "Minna",
                                                            "New Shagunnu",
                                                            "Suleja",
                                                            "Tegina",
                                                            "Ukata",
                                                            "Wawa",
                                                            "Zungeru",
                                                            "Abeokuta",
                                                            "Ado Odo",
                                                            "Idi Iroko",
                                                            "Ifo",
                                                            "Ijebu-Ife",
                                                            "Ijebu-Igbo",
                                                            "Ijebu-Ode",
                                                            "Ilaro",
                                                            "Imeko",
                                                            "Iperu",
                                                            "Isara",
                                                            "Owode",
                                                            "Agbabu",
                                                            "Akure",
                                                            "Idanre",
                                                            "Ifon",
                                                            "Ilare",
                                                            "Ode",
                                                            "Ondo",
                                                            "Ore",
                                                            "Owo",
                                                            "Apomu",
                                                            "Ejigbo",
                                                            "Gbongan",
                                                            "Ijebu-Jesa",
                                                            "Ikire",
                                                            "Ikirun",
                                                            "Ila Orangun",
                                                            "Ile-Ife",
                                                            "Ilesa",
                                                            "Ilobu",
                                                            "Inisa",
                                                            "Iwo",
                                                            "Modakeke",
                                                            "Oke Mesi",
                                                            "Olupona",
                                                            "Osogbo",
                                                            "Otan Ayegbaju",
                                                            "Oyan",
                                                            "Ago Are",
                                                            "Alapa",
                                                            "Fiditi",
                                                            "Ibadan",
                                                            "Igbeti",
                                                            "Igbo-Ora",
                                                            "Igboho",
                                                            "Kisi",
                                                            "Lalupon",
                                                            "Ogbomoso",
                                                            "Okeho",
                                                            "Orita Eruwa",
                                                            "Oyo",
                                                            "Saki",
                                                            "Amper",
                                                            "Bukuru",
                                                            "Dengi",
                                                            "Jos",
                                                            "Kwolla",
                                                            "Langtang",
                                                            "Pankshin",
                                                            "Panyam",
                                                            "Vom",
                                                            "Yelwa",
                                                            "Binji",
                                                            "Dange",
                                                            "Gandi",
                                                            "Goronyo",
                                                            "Gwadabawa",
                                                            "Illela",
                                                            "Rabah",
                                                            "Sokoto",
                                                            "Tambuwal",
                                                            "Wurno",
                                                            "Baissa",
                                                            "Beli",
                                                            "Gassol",
                                                            "Gembu",
                                                            "Ibi",
                                                            "Jalingo",
                                                            "Lau",
                                                            "Mutum Biyu",
                                                            "Riti",
                                                            "Wukari",
                                                            "Damaturu",
                                                            "Dankalwa",
                                                            "Dapchi",
                                                            "Daura",
                                                            "Fika",
                                                            "Gashua",
                                                            "Geidam",
                                                            "Goniri",
                                                            "Gorgoram",
                                                            "Gujba",
                                                            "Gwio Kura",
                                                            "Kumagunnam",
                                                            "Lajere",
                                                            "Machina",
                                                            "Nguru",
                                                            "Potiskum",
                                                            "Anka",
                                                            "Dan Sadau",
                                                            "Gummi",
                                                            "Gusau",
                                                            "Kaura Namoda",
                                                            "Kwatarkwashi",
                                                            "Maru",
                                                            "Moriki",
                                                            "Sauri",
                                                            "Tsafe"
                                                        );
                                                        ?>


                                                        <select class="form-control" name="city">
                                                            <option data-display="city">city</option>
                                                            <?php
                                                            foreach ($city_names as $select) {
                                                                echo ' <option value="' . $select . '">' . $select . '</option>';
                                                            }
                                                            ?>
                                                            <!-- <option value="1">New York</option>
                                                            <option value="2">California</option>
                                                            <option value="2">London</option>
                                                            <option value="2">Chicago</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>State</label>
                                                    <div class="select-box">
                                                        <select class="form-control" name="state">
                                                            <option data-display="State">State</option>
                                                            <option>ABUJA FCT</option>
                                                            <option>ABIA</option>
                                                            <option>ADAMAWA</option>
                                                            <option>AKWA IBOM</option>
                                                            <option>ANAMBRA</option>
                                                            <option>BAUCHI</option>
                                                            <option>BAYELSA</option>
                                                            <option>BENUE</option>
                                                            <option>BORNO</option>
                                                            <option>CROSS RIVER</option>
                                                            <option>DELTA</option>
                                                            <option>EBONYI</option>
                                                            <option>EDO</option>
                                                            <option>EKITI</option>
                                                            <option>ENUGU</option>
                                                            <option>GOMBE</option>
                                                            <option>IMO</option>
                                                            <option>JIGAWA</option>
                                                            <option>KADUNA</option>
                                                            <option>KANO</option>
                                                            <option>KATSINA</option>
                                                            <option>KEBBI</option>
                                                            <option>KOGI</option>
                                                            <option>KWARA</option>
                                                            <option>LAGOS</option>
                                                            <option>NASSARAWA</option>
                                                            <option>NIGER</option>
                                                            <option>OGUN</option>
                                                            <option>ONDO</option>
                                                            <option>OSUN</option>
                                                            <option>OYO</option>
                                                            <option>PLATEAU</option>
                                                            <option>RIVERS</option>
                                                            <option>SOKOTO</option>
                                                            <option>TARABA</option>
                                                            <option>YOBE</option>
                                                            <option>ZAMFARA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Country</label>
                                                    <div class="select-box">
                                                        <select class="form-control form-control" name="area_location">
                                                            <option data-display="Country">Country</option>
                                                            <!-- Country names and Country Name -->
                                                            <option value="Nigeria">Nigeria</option>

                                                            <!-- <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Aland Islands">Aland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda
                                                            </option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bonaire, Sint Eustatius and Saba">Bonaire,
                                                                Sint Eustatius and Saba</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and
                                                                Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British
                                                                Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African
                                                                Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling)
                                                                Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, Democratic Republic of the Congo">
                                                                Congo, Democratic Republic of the Congo</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Curacao">Curacao</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic
                                                            </option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands
                                                                (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern
                                                                Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard
                                                                Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See
                                                                (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic
                                                                Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">
                                                                Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of
                                                            </option>
                                                            <option value="Kosovo">Kosovo</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao
                                                                People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab
                                                                Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, the Former Yugoslav Republic of">
                                                                Macedonia, the Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia,
                                                                Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of
                                                            </option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles
                                                            </option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana
                                                                Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian
                                                                Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation
                                                            </option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                            </option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Martin">Saint Martin</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and
                                                                Miquelon</option>
                                                            <option value="Saint Vincent and the Grenadines">Saint
                                                                Vincent and the Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe
                                                            </option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Serbia and Montenegro">Serbia and Montenegro
                                                            </option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Sint Maarten">Sint Maarten</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option
                                                                value="South Georgia and the South Sandwich Islands">
                                                                South Georgia and the South Sandwich Islands</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan
                                                                Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic
                                                            </option>
                                                            <option value="Taiwan, Province of China">Taiwan, Province
                                                                of China</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania,
                                                                United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-Leste">Timor-Leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago
                                                            </option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos
                                                                Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates
                                                            </option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United
                                                                States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands,
                                                                British</option>
                                                            <option value="Virgin Islands, U.s.">Virgin Islands, U.s.
                                                            </option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="gallery-box">
                                                    <h4><i class="icon-16"></i>Featured Images:</h4>
                                                    <div class="upload-inner centred">
                                                            <input type="file"  class="dropify"  name="featuredimage" required>
                                                    </div>
                                                    <h4><i class="icon-16"></i>Gallery Image:</h4>
                                                    <div class="upload-inner centred">

                                                        <input type="file" class="dropify" name="galleryimage[]"
                                                            multiple required>
                                                    </div>
                                                    <!-- <a href="profile.html" class="theme-btn btn-one">Add Images</a> -->
                                                </div>
                                                
                                                <button class="theme-btn btn-one m-3" name="uploadProps">Upload</button>
                                            </div>
                                            


                                            <!-- 
                                                                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                                                            <div class="field-input">
                                                                                                <label>Bedrooms</label>
                                                                                                <input type="text" name="bedrooms" placeholder="Bedrooms">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                                                            <div class="field-input">
                                                                                                <label>Bathrooms</label>
                                                                                                <input type="text" name="bathrooms" placeholder="Bathrooms">
                                                                                            </div>
                                                                                        </div> -->
                                            <!-- <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Category</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="propertyCategory">
                                                            <option value="Distress Properties">Distress Properties
                                                            </option>
                                                            <option value="Land">Land</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Address</label>
                                                <div class="select-box">
                                                    <select class="form-control" name="address">
                                                       <option data-display="Zip/Postal Code">Zip/Postal Code</option>
                                                       <option value="1">4025</option>
                                                       <option value="2">6528</option>
                                                       <option value="3">0028</option>
                                                       <option value="4">other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>City</label>
                                                <div class="select-box">
                                                    <select class="form-control" name="city">
                                                       <option data-display="Property Type">Property Type</option>
                                                       <option value="1">Commersial</option>
                                                       <option value="2">Tourist</option>
                                                       <option value="3">Contemporary</option>
                                                       <option value="4">Apartment</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>State</label>
                                                <div class="select-box">
                                                    <select class="form-control" name="state">
                                                       <option data-display="Property Status">Property Status</option>
                                                       <option value="1">For Sale</option>
                                                       <option value="2">Not Sale</option>
                                                       <option value="3">Sold Out</option>
                                                       <option value="4">Offer Sale</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Postal Code</label>
                                                <div class="select-box">
                                                    <select class="form-control" name="postalcode">
                                                       <option data-display="Select Price">Select Price</option>
                                                       <option value="1">$2500</option>
                                                       <option value="2">$3000</option>
                                                       <option value="3">$4000</option>
                                                       <option value="4">Othre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Description</label>
                                                <textarea placeholder="Enter your text"></textarea>
                                            </div>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="tab" id="tab-2">
                                <div class="gallery-box">
                                    <h4><i class="icon-16"></i>Featured Images:</h4>
                                    <div class="upload-inner centred">
                                        <i class="fal fa-cloud-upload"></i>
                                        <div class="upload-box">
                                            <input type="file" id="check1" name="featuredimage">
                                            <label for="check1">Click here to upload your image</label>
                                        </div>
                                    </div>
                                    <h4><i class="icon-16"></i>Gallery Image:</h4>
                                    <div class="upload-inner centred">
                                        <i class="fal fa-cloud-upload"></i>
                                        <div class="upload-box">
                                            <input type="file" id="check2" name="galleryimage[]" multiple>
                                            <label for="check2">Click here to upload your image</label>
                                        </div>
                                    </div>
                                    <a href="profile.html" class="theme-btn btn-one">Add Images</a>
                                </div>
                            </div>
                            <div class="tab" id="tab-3">
                                <div class="property-details">
                                    <h4><i class="icon-19"></i>Property Details:</h4>
                                    <div class="inner-box default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property ID</label>
                                                    <input type="text" name="propertyid" placeholder="Property ID">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Age</label>
                                                    <input type="text" name="propertyage" placeholder="Property Age">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Features</label>
                                                    <div class="field-input">
                                                        <textarea placeholder="Property Features"
                                                            name="propertyfeatures"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Bathrooms</label>
                                                <div class="select-box">
                                                    <select class="form-control">
                                                       <option data-display="Bathrooms">Bathrooms</option>
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Parking</label>
                                                <div class="select-box">
                                                    <select class="form-control">
                                                       <option data-display="Parking">Parking</option>
                                                       <option value="1">Parking 02</option>
                                                       <option value="2">Parking 03</option>
                                                       <option value="3">Parking 03</option>
                                                       <option value="4">Parking 04</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Storage Room</label>
                                                <div class="select-box">
                                                    <select class="form-control">
                                                       <option data-display="Storage Room">Storage Room</option>
                                                       <option value="1">Yes</option>
                                                       <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <ul class="other-option clearfix">
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check4" checked="">
                                            <label for="check4">Air Conditioned</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check5">
                                            <label for="check5">Swimming Pool</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check6" checked="">
                                            <label for="check6">Washer & Dryer</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check7">
                                            <label for="check7">Laundry</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check8">
                                            <label for="check8">Gym</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check9">
                                            <label for="check9">Basketball Court</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-box">
                                            <input type="checkbox" id="check10">
                                            <label for="check10">Refrigerator</label>
                                        </div>
                                    </li>
                                </ul> 
                                <h6>Property Documents</h6>
                                <div class="upload-inner centred">
                                    <i class="fal fa-cloud-upload"></i>
                                    <div class="upload-box">
                                        <input type="file" id="check2">
                                        <label for="check2">Click here to upload your image</label>
                                    </div>
                                </div>
                                <a href="profile.html" class="theme-btn btn-one">Add Images</a>
                                </div>
                            </div>
                            <div class="tab" id="tab-4">
                                <div class="gallery-box">
                                    <h4><i class="icon-34"></i>Location:</h4>
                                    <div class="inner-box default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Postal Code</label>
                                                    <input type="text" name="postalcode" placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Area Location</label>
                                                    <input type="text" name="area_location" placeholder="Area Location">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Longitude</label>
                                                    <input type="text" name="longtitude" placeholder="-205.421560">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Latitude</label>
                                                    <input type="text" name="langtitude" placeholder="32.963381">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>City</label>
                                                    <div class="select-box">
                                                        <select class="form-control" name="city">
                                                            <option data-display="city">city</option>
                                                            <option value="1">New York</option>
                                                            <option value="2">California</option>
                                                            <option value="2">London</option>
                                                            <option value="2">Chicago</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>State</label>
                                                    <div class="select-box">
                                                        <select class="form-control" name="state">
                                                            <option data-display="State">State</option>
                                                            <option value="1">New York</option>
                                                            <option value="2">California</option>
                                                            <option value="2">London</option>
                                                            <option value="2">Chicago</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="google-map-area">
                                    <div 
                                        class="google-map" 
                                        id="contact-google-map" 
                                        data-map-lat="40.712776" 
                                        data-map-lng="-74.005974" 
                                        data-icon-path="assets/images/icons/map-marker.png"  
                                        data-map-title="Brooklyn, New York, United Kingdom" 
                                        data-map-zoom="12" 
                                        data-markers='{
                                            "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                                        }'>

                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-5">
                                <div class="gallery-box">
                                    <h4><i class="icon-16"></i>Agent:</h4>
                                    <div class="inner-box default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Agent Name</label>
                                                    <input type="text" name="agent_name" placeholder="Agent Name">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Agent Email</label>
                                                    <input type="email" name="agent_email" placeholder="Agent Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Agent Phone</label>
                                                    <input type="text" name="agent_phone" placeholder="Agent Phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <div class="field-input">
                                                <label>Size Of Rooms In Sq Ft</label>
                                                <input type="text" placeholder="150 Sq Ft">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="upload-inner centred">
                                    <i class="fal fa-cloud-upload"></i>
                                    <div class="upload-box">
                                        <input type="file" id="check3">
                                        <label for="check3">Click here to upload your image</label>
                                    </div>
                                </div>
                                <a href="profile.html" class="theme-btn btn-one">Add Images</a>
                                    <button class="theme-btn btn-one" name="uploadProps">Upload</button>
                                </div>
                            </div> -->
                        </div>
                    </form>

                </div>
            </div>
        </section>
        <!-- myprofile-section end -->


        <!-- subscribe-section -->
        <!-- <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <span>Subscribe</span>
                            <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                        <div class="form-inner">
                            <form action="contact.html" method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter your email" required="">
                                    <button type="submit">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- subscribe-section end -->


        <!-- main-footer -->
        <?php include('include/footer.php') ?>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/isotope.js"></script>
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>
    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="assets/js/gmaps.js"></script>
    <script src="assets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <script src="./assets/dropify-master/dropify-master/dist/js/dropify.min.js"></script>
    <script src="./assets/dropify-master/dropify-master/dist/js/customDropify.js"></script>
    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

    <script>
  // Initialize Dropzone
  Dropzone.autoDiscover = false;
  var myDropzone = new Dropzone("#myDropzone", {
    paramName: "file",
    maxFilesize: 5, // Maximum file size in MB
    maxFiles: 5, // Maximum number of files allowed
    acceptedFiles: "image/*", // Accept only image files
    previewsContainer: "#preview-container", // Element to display image previews

    // Optional: Add additional configuration or event handlers as needed
    // ...
  });
</script>


</body><!-- End of .page_wrapper -->

</html>