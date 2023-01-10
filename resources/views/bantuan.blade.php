@extends('layoutnavbar.navbar')
@section('navbar')

    <div class="container-help">
        <button class="item-help1 help" onclick="pengelola()">Pengelola</button>
        <button class="item-help2 help"onclick="member()">member</button>
    </div>
    <div id="awal" style="display:">
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/1.halaman awal.png"><img class="img-fluid" src="/img/bantuan/1.1.halaman awal responsive.png"></div>
                        <div class="col-md-6">
                            <h3>1. Halaman Awal Aplikasi</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Pada halaman ini terdapat form untuk mengisi kata kunci seperti nama lapangan ataupun nama kota yang digunakan untuk mencari lapangan yang diinginkan.</li>
                                        <li>Pada halaman ini pengguna hanya bisa melakukan pencarian lapangan saja,tanpa bisa melakukan pemesanan karena pengguna belum registrasi.</li>
                                        <li>Halaman ini juga bersifat responsive terhadap layar,yang artinya konten didalam halaman ini akan fleksibel mengikuti layar yang digunakan pengguna dan tidak akan terpotong akibat keterbatasan layar.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>2. Halaman Log In</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman ini digunakan ketika pengguna sudah memiliki akun yang terdaftar dan ingin mengakses fitur utama yang ada di aplikasi ini.</li>
                                        <li>Apabila pengguna belum memiliki akun yang terdaftar,dihalaman ini juga terdapat tombol link yang akan mengarahkan pengguna ke halaman registrasi.</li>
                                        <li>Halaman ini juga sudah bersifat responsive.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/2.1.halaman login.png"><img class="img-fluid" src="/img/bantuan/2.2.halaman login responsive.png"></div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/3.1.halaman daftar.png"><img class="img-fluid" src="/img/bantuan/3.2.halaman daftar responsive.png"></div>
                        <div class="col-md-6">
                            <h3>3. Halaman Daftar</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman ini digunakan ketika pengguna belum memiliki akun yang terdaftar dan ingin mengakses fitur utama yang ada di aplikasi ini.</li>
                                        <li>Apabila pengguna sudah memiliki akun yang terdaftar,dihalaman ini juga terdapat tombol link yang akan mengarahkan pengguna ke halaman Login.</li>
                                        <li>Halaman ini juga sudah bersifat responsive.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>4. Halaman Tentang</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman ini berisi tentang tujuan akhir dari pembuatan aplikasi itu sendiri,dan manfaat apa saja yang akan diperoleh.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/2.halaman tentang.png"></div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/4.1.pengaturan profile user.png"><img class="img-fluid" src="/img/bantuan/4.2.pengaturan profile responsive.png"><img class="img-fluid" src="/img/bantuan/4.3.pengaturan profile responsive2.png"></div>
                        <div class="col-md-6">
                            <h3>5. Pengaturan Profile</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Pada halaman ini berisi detail user yang sedang masuk.</li>
                                        <li>Pada halaman pengguna dapat merubah :email,username,ataupun passsword sesuai form yang tersedia.</li>
                                        <li>Pengguna juga dapat mengupload foto yang akan digunakan sebagai foto profile di aplikasi ini.</li>
                                        <li>Ukuran foto tidak boleh lebih dari 1Mb</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <div id="pengelola" style="display:none">
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/5.halaman dashboard pengelola.png"></div>
                        <div class="col-md-6">
                            <h3>1. Dashboard Pengelola</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman ini berisi detail lapangan yang telah didaftarkan oleh pengelola,dan digunakan untuk melakukan pemesanan apabila ada member yang melakukan transaksi secara cash atau tidak melalui aplikasi ini.</li>
                                        <li>Apabila pengelola belum mendaftarkan lapangan nya,maka akan muncul tombol yang akan mengarahkan pengelola menuju form untuk mellakukan registrasi lapangan.</li>
                                        <li>Terdapat tombol Reset Lapangan yang apabila di tekan oleh pengelola akan mereset semua pesanan yang dipesan di lapangan tersebut pada satu minggu itu</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>2. Pengaturan Lapangan</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman ini digunakan untuk mengedit detail lapangan yang dimiliki lapangan.Berada di sebelah kiri halaman</li>
                                        <li>Di sebelah kanan halaman terdapat preview tampilan apabila detail lapangan sudah diisikan.</li>
                                        <li>Form-form pada halaman ini akan terisi otomatis sesuai detail lapangan yang ada apabila lapangan sudah terdaftar.</li>
                                        <li>Apabila lapangan belum terdaftar,maka form-form yang ada akan kosong</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/6. setting lapangan.png"></div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/7.1.saldo pengelola.png"><img class="img-fluid" src="/img/bantuan/7.2.saldo pengelola responsive.png"></div>
                        <div class="col-md-6">
                            <h3>3. Saldo Pengelola</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman berisi total saldo yang dimiliki pengelola Pada aplikasi ini.</li>
                                        <li>Tombol tarik berisi form yang digunakan oleh pengelola apabila ingin melakukan penarikan saldo yang dimilikinya.</li>
                                        <li>Tombol transaksi berisi rincian semua pesanan yang dilakukan oleh member dilapangan milik pengelola selama 3 bulan terakhir.</li>
                                        <li>Apabila sudah lebih dari 3 bulan,detail transaksi akan terreset otomatis</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <div id="member" style="display:none">
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/8.1.halaman dashboard member.png"><img class="img-fluid" src="/img/bantuan/8.2.dashboard member responsive.png"></div>
                        <div class="col-md-6">
                            <h3>1. Dashboard Member</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Halaman ini berisi daftar semua lapangan yang terdaftar di aplikasi ini,yang berisi maksimal 20 lapangan pada setiap halaman nya.</li>
                                        <li>Setiap lapangan yang ada,dapat di tekan dan akan mengarahkan member menuju detail lapangan tersebut.</li>
                                        <li>Pada bagian atas terdapat form untuk mencari berdasarkan nama lapangan,nama kota,jam dan hari yang di inginkan.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>2. Detail Lapangan</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Pada halaman ini berisi detail lapangan yang telah dipilih pada halaman dashboard sebelumnya.</li>
                                        <li>Pada halaman ini member dapat melihat jam mana saja yang kosong dan dapat dilakukan pemesanan.</li>
                                        <li>Pada setiap jam yang ditampilkan akan berubah warna menjadi abu-abu dan tidak dapat di klik apabila telah melewati jam pada saat itu secara otomatis.</li>
                                        <li>Warna dasar jam yaitu hijau,dan akan berubah warna menjadi merah apabila telah di pesan.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/9.1.detail lapangan member.png"><img class="img-fluid" src="/img/bantuan/9.2.detail lapangan kurang responsive.png"></div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/10.1.saldo member.png"><img class="img-fluid" src="/img/bantuan/10.2.saldo member 2.png"></div>
                        <div class="col-md-6">
                            <h3>3. Saldo Member</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Pada halaman ini menunjukkan total saldo yang dimiliki oleh member.</li>
                                        <li>Tombol tarik berisi form yang digunakan untuk melakukan penarikan oleh member.</li>
                                        <li>Tombol deposit berisi form yang digunakan untuk melakukan penambahan saldo member.</li>
                                        <li>Tombol transaksi berisi detail transaksi yang di lakukan oleh member selama 3 bulan terakhir,dan akan ter reset otomatis setelahnya.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <main class="page landing-page">
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>4. Ticket</h3>
                            <div class="getting-started-info">
                                <p>
                                    <ul>
                                        <li>Pada halaman ini berisi ticket pesanan sesuai tiap-tiap jam yang di miliki member.</li>
                                        <li>Dalam masing-masing ticket berisi detail pesanan yang meliputi:jam,nama lapangan,hari.</li>
                                        <li>Ticket akan ter reset secara otomatis setiap seminggu sekali.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="img-fluid" src="/img/bantuan/11.1.halaman ticket.png"><img class="img-fluid" src="/img/bantuan/11.2.halaman ticket responsive.png"></div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        function pengelola(){
            var a= document.getElementById('awal');
            a.style.display='none';
            var m=document.getElementById('member');
            m.style.display='none';
            var p=document.getElementById('pengelola');
            if(p.style.display==='none'){
                p.style.display=''
            }else{
                p.style.display='none';
                a.style.display='';
            }
        }

        function member(){
            var a= document.getElementById('awal');
            a.style.display='none';
            var p=document.getElementById('pengelola');
            p.style.display='none';
            var m=document.getElementById('member');
            if(m.style.display==='none'){
                m.style.display=''
            }else{
                m.style.display='none';
                a.style.display='';
            }
        }
    </script>

@endsection