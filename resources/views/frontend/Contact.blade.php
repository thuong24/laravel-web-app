@extends('layouts.site')
@section('title', 'Liên hệ')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg')}}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Gửi liên hệ về fashe
    </h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-b-30">
                <h4>Thông tin liên hệ</h4>
                <div class="media">
                    <i class="pull-left fa fa-home"></i>
                    <div class="media-body">
                        <strong>Trụ sở chính:</strong>
                        <br>75, Trần thị điệu, Phước long B, Thủ đức, Tp.HCM
                    </div>
                </div>
                <div class="media">
                    <i class="pull-left fa fa-phone"></i>
                    <div class="media-body">
                        <strong>Điện thoại:</strong>
                        <br>0702775390
                    </div>
                </div>
                <div class="media">
                    <i class="pull-left fa fa-envelope-o"></i>
                    <div class="media-body">
                        <strong>Email:</strong>
                        <br>fashe@gamil.com
                    </div>
                </div>
                <div class="contact-details">
                    <p>Website www.fashe.com là website chuyên bán các dòng sản phẩm thời trang nam: Quần jean nam, quần tây, quần kaki, áo sơ mi, áo khoác, áo vest, áo thun, phụ kiện nam, giày dép nam...</p>
                </div>
                <div class="p-r-20 p-r-0-lg">
                    <iframe
                        width="100%"
                        height="400"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?q=place_id&key=YOUR_API_KEY" allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <form class="leave-comment" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <h4 class="m-text26 p-b-36 p-t-15">
                        Gửi cho chúng tôi tin nhắn của bạn
                    </h4>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Tên">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Điện thoại">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">


                  <select name="title" id="title" class="form-control">
                    <option value="0">---chọn chủ đề liên hệ---</option>
                    {!! $contactid !!}
                  </select>
                    </div>
                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="content" placeholder="Lời nhắn"></textarea>

                    <div class="w-size25">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/bootstrap/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "đã thêm vào giỏ hàng!", "success");
            });
        });

        $('.block2-btn-addwishlist').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "đã thêm vào danh sách mong muốn!", "success");
            });
        });
    </script>

    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/main.js')}}"></script>
@endsection
