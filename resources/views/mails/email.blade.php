<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />
<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .horizontal-timeline .items {
        border-top: 2px solid #ddd;
    }

    .horizontal-timeline .items .items-list {
        position: relative;
        margin-right: 0;
    }

    .horizontal-timeline .items .items-list:before {
        content: "";
        position: absolute;
        height: 8px;
        width: 8px;
        border-radius: 50%;
        background-color: #ddd;
        top: 0;
        margin-top: -5px;
    }

    .horizontal-timeline .items .items-list {
        padding-top: 15px;
    }
</style>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                    <div class="card-body p-5">

                        <p class="lead fw-bold mb-5" style="color: #f37a27;">Hóa đơn </p>

                        <div class="row">
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Ngày mua hàng </p>
                                <p>{{ $student->created_at }}</p>
                            </div>
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Mã hóa dơn </p>
                                <p>{{ $student->code }}</p>
                            </div>
                        </div>

                        <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                            <div class="row">
                                <div class="col-md-8 col-lg-9">
                                    <p>Khóa học : {{ $course->name }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-9">
                                    <p class="mb-0">Lớp học : {{ $class->name }} </p>
                                </div>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                <p class="lead fw-bold mb-0" style="color: #f37a27;">Chi phí : {{ $student->price }}</p>
                            </div>
                        </div>

                        <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tình trạng hóa đơn </p>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="horizontal-timeline">

                                    <ul class="list-inline items d-flex justify-content-between">
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                                Đặt hàng </p class="py-1 px-2 rounded text-white"
                                                style="background-color: #f37a27;">
                                        </li>
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                                Thanh toán </p class="py-1 px-2 rounded text-white"
                                                style="background-color: #f37a27;">
                                        </li>
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                                Hoàn thành
                                            </p>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>

                        <p class="mt-4 pt-2 mb-0">Xảy ra lỗi hãy <a href="#!" style="color: #f37a27;">liên hệ với
                                chúng tôi để được hỗ trợ </a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
