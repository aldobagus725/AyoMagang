<div class="container-fluid" id="footer">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col text-center" style="padding-bottom:40px;">
                <h2>Contact Us</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <strong>Email:</strong>
                <ul>
                    <li>ayomagangayo@gmail.com</li>
                </ul>
                <strong>Nomor Telepon:</strong>
                <ul>
                    <li>+6282146931611</li>
                </ul>
                <strong>Social Media:</strong>
                <br>
                <ul>
                    <li>Instagram</li>
                    <li>Facebook</li>
                    <li>WhatsApp</li>
                </ul>
                <strong>Work Hours:</strong>
                <ul>
                    <li>Monday - Friday</li>
                    <li>08.00-17.00</li>
                    <li>Weekends &amp; Days off is OFF</li>
                </ul>
                <br>
                <br>
            </div>
            <div class="col-sm-4">
                <h5>G-Maps ITB STIKOM Renon Bali:</h5> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15776.77683037235!2d115.2266653!3d-8.673073119485599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe8413f111e0aa096!2sSTIKOM%20Bali!5e0!3m2!1sen!2sid!4v1600933336258!5m2!1sen!2sid" width="100%" height="155" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <br>
                <br>
                <ul>
                    <li><strong>Office Bali:</strong><br>
                        Jl. Raya Puputan No. 86 Renon – Denpasar, Telp: (0361) 244445
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h5>G-Maps HELP University Malaysia:</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7826783601554!2d101.66895621457626!3d3.15193729770496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49aca5c7421b%3A0xb7242dad56a6c240!2sHELP%20University!5e0!3m2!1sen!2sid!4v1600933498924!5m2!1sen!2sid" width="100%" height="155" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <br>
                <br>
                <ul>
                    <li><strong>Office Malaysia:</strong><br>
                        No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur, Malaysia
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" style="padding-bottom:20px;">
            <div class="col text-right">
                <?php if(isset($_SESSION['student'])) {?>
                <h5 style="font-style:cursive;font-weight:bold;font-size:16px;">Copyright &copy; 2020 AyoMagang</h5>
                <br>
                <?php }else if(isset($_SESSION['company'])){?>
                <h5 style="font-style:cursive;font-weight:bold;font-size:16px;">Copyright &copy; 2020 AyoMagang</h5>
                <br>
                <?php }else if(isset($_SESSION['superadmin'])){?>
                <h5 style="font-style:cursive;font-weight:bold;font-size:16px;">Copyright &copy; 2020 AyoMagang</h5>
                <br>
                <?php }else{  ?>
                <a href="superadmin/login.php">Super Admin Login</a><br>
                <h5 style="font-style:cursive;font-weight:bold;font-size:16px;">Copyright &copy; 2020 AyoMagang</h5>
                <br>
                <?php }?> 
            </div>
        </div>
    </div>
</div>