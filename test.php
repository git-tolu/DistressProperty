<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Property</h5>
                                </div>
                                <div class="widget-content">
                                    <form action="" method="POST">
                                        <div class="select-box">
                                            <select class="form-control" name="propertyCategory">
                                                <option data-display="Property Type">Property Type</option>
                                                <option value="Distress Properties">Distress Properties</option>
                                                <option value="Land">Land</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="form-control" name="city">
                                                <option data-display="Select City">Select City</option>
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

                                                <?php
                                                foreach ($city_names as $select) {
                                                    echo ' <option value="' . $select . '">' . $select . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="form-control" name="state">
                                                <option data-display="Select State">Select State</option>
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
                                        <div class="select-box">
                                            <select class="form-control" name="area_location">
                                                <option data-display="Select Country">Select Country</option>
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
                                                <option value="South Georgia and the South Sandwich Islands">
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
                                        <div class="filter-btn">
                                            <button type="submit" name="searchBtn" class="theme-btn btn-one"><i
                                                    class="fas fa-filter"></i>&nbsp;Filter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="price-filter sidebar-widget">
                                <div class="widget-title">
                                    <h5>Select Price Range</h5>
                                </div>
                                <div class="range-slider clearfix">
                                    <div class="clearfix">
                                        <div class="input">
                                            <input type="text" class="property-amount" name="field-name" readonly="">
                                        </div>
                                    </div>
                                    <div class="price-range-slider"></div>
                                </div>
                            </div>
                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Status Of Property</h5>
                                </div>
                                <ul class="category-list clearfix">
                                    <li><a href="property-details.html">For Rent <span>(200)</span></a></li>
                                    <li><a href="property-details.html">For Sale <span>(700)</span></a></li>
                                </ul>
                            </div>
                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Amenities</h5>
                                </div>
                                <ul class="category-list clearfix">
                                    <li><a href="property-details.html">Air Conditioning <span>(17)</span></a></li>
                                    <li><a href="property-details.html">Central Heating <span>(4)</span></a></li>
                                    <li><a href="property-details.html">Cleaning Service <span>(12)</span></a></li>
                                    <li><a href="property-details.html">Dining Room <span>(8)</span></a></li>
                                    <li><a href="property-details.html">Dishwasher <span>(5)</span></a></li>
                                    <li><a href="property-details.html">Dishwasher <span>(2)</span></a></li>
                                    <li><a href="property-details.html">Family Room <span>(19)</span></a></li>
                                    <li><a href="property-details.html">Onsite Parking <span>(11)</span></a></li>
                                    <li><a href="property-details.html">Fireplace <span>(7)</span></a></li>
                                    <li><a href="property-details.html">Hardwood Flows <span>(9)</span></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>