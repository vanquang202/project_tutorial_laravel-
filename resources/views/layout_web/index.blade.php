<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layout_web._style')
</head>

<body>

    <div class="site-wrap">
        @include('layout_web._header')

        @yield('conten_web')

        @include('layout_web._footer')
    </div>

    @include('layout_web._script')
    <script>
        $("#search").on("input", function() {
            if ($(this).val().trim() == "") {
                $("#show-search").html(``);
                return false;
            }
            $.ajax({
                type: "POST",
                url: "{{ route('api.seach') }}",
                data: {
                    content: $(this).val()
                },
                success: function(response) {
                    var html = "";
                    if (response.dataCategory.length > 0) {
                        var htmlDataCategory = response.dataCategory.map(function(data) {
                            return `
                                <div style="border: 1px solid black;
                                        padding: 10px;
                                        margin: 10px;">
                                        <a href="https://api.laravel.org/shop?category_id=${data.id}" >
                                            <p>${data.name}</p>
                                        </a>
                                </div>
                                `;
                        }).join(" ");
                    } else {
                        var htmlDataCategory = `Không có bản ghi nào `;
                    }

                    if (response.dataCourse.length > 0) {
                        var htmlDataCourse = response.dataCourse.map(function(data) {
                            return `
                            <div style="border: 1px solid black;
                                        padding: 10px;
                                        margin: 10px;">
                                        <a href="https://api.laravel.org/couser/${data.id}" >
                                            <p>${data.name}</p>
                                            <small>${data.detail}</small>
                                        </a>
                                </div>

                    `;
                        }).join(" ");
                    } else {
                        var htmlDataCourse = `Không có bản ghi nào `;
                    }

                    html = "<h2>Danh mục : </h2>" + htmlDataCategory + "<h2>Khóa học : </h2>" +
                        htmlDataCourse;
                    $("#show-search").html(html);
                },
                error: function(request, status, error) {
                    alert("Lỗi  tìm kiếm !");
                    location.reload();
                }
            });
        });
    </script>
    @yield('js_web')
</body>

</html>
