@extends('layouts.admin.master')
@section('title', $title)
@section('content')
    <style>
        #drop-area {
            border: 2px dashed #ccc;
            border-radius: 20px;
            width: 100%;
            font-family: sans-serif;
            padding: 20px;
        }

        #drop-area.highlight {
            border-color: purple;
        }

        p {
            margin-top: 0;
        }

        .my-form {
            margin-bottom: 10px;
        }

        #gallery {
            margin-top: 10px;
        }

        #gallery img {
            width: 150px;
            margin-bottom: 15px;
            vertical-align: middle;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .gallery__item {
            position: relative;
            background: #fff;
            padding: 10px;
            margin-right: 10px;
            margin-top: 10px;
            width: 11%;
        }

        @media (max-width: 768px) {
            .gallery__item {
                width: 33.33%;
            }
        }

        @media (max-width: 480px) {
            .gallery__item {
                width: 50%;
            }
        }

        .remove_image_icon {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: all 0.3s ease-in-out;
            font-size: 15px;
        }

        .button {
            display: inline-block;
            padding: 10px;
            background: #ccc;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .button:hover {
            background: #ddd;
        }

        #fileElem {
            display: none;
        }
    </style>
    <!-- Single pro tab start-->
    <div class="single-product-tab-area mg-b-30">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <div style="display:flex">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit"
                                                aria-hidden="true"></i>
                                            Sản Phẩm</a></li>
                                    <li><a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Ảnh</a>
                                    </li>
                                    <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Mô Tả</a>
                                    </li>
                                </ul>

                                <div id="btnSubmit" class="text-center custom-pro-edt-ds">
                                    @if (isset($products->product_id))
                                        <button type="button" class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="update()">Cập Nhật
                                        </button>
                                    @else
                                        <button type="button" class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="save()">Thêm Mới
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="fa-solid fa-fan" aria-hidden="true"></i>
                                                    </span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Tên Sản Phẩm"
                                                        value="{{ isset($products) ? $products->name : '' }}">
                                        
                                                </div>
                                                <p class="text_error__name"></p>
                                                <select id="category_id" name="select"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="">Chọn Loại Sản Phẩm</option>
                                                    @if (count($category_list) > 0)
                                                        @foreach ($category_list as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                @if (isset($products) && $products->category_id == $category->category_id) {{ 'selected' }} @endif>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p class="text_error text_error__category_id"></p>
                                                <div class="input-group">
                                                    <select id="status_id" name="select"
                                                        class="form-control pro-edt-select form-control-primary">
                                                        <option value="">Chọn Trạng Thái</option>
                                                        @if (count($status_list) > 0)
                                                            @foreach ($status_list as $status)
                                                                <option value="{{ $status->status_id }}"
                                                                    @if (isset($products) && $products->status_id == $status->status_id) {{ 'selected' }} @endif>
                                                                    {{ $status->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <p class="text_error__status_id"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-calculator"
                                                            aria-hidden="true"></i></span>
                                                    <input id="inventory_number" type="text" name="inventory"
                                                        class="form-control" placeholder="Tồn Kho"
                                                        value="{{ isset($products) ? $products->inventory_number : '' }}">
                                                </div>
                                                <p class="text_error__inventory_number"></p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-dollar-sign"
                                                            aria-hidden="true"></i></span>
                                                    <input id="price" type="text" name="price" class="form-control"
                                                        placeholder="Đơn Giá"
                                                        value="{{ isset($products) ? $products->price : '' }}">
                                                </div>
                                                <p class="text_error__price"></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="drop-area">
                                                    <form class="my-form">
                                                        <p>Chọn hoặc kéo thả các ảnh vào khu vực bên dưới.</p>
                                                        <input type="file" id="fileElem" multiple accept="image/*"
                                                            onchange="handleFiles(this.files)">
                                                        <label class="button" for="fileElem">Chọn một số file ảnh</label>
                                                    </form>
                                                    <progress id="progress-bar" max=100 value=0></progress>
                                                    <div id="gallery" class="gallery">
                                                        @if (isset($products) && count($products->product_image) > 0)
                                                            @foreach ($products->product_image as $item)
                                                                <div class="gallery__item" data-path="{{$item->image}}">
                                                                    <img src="{{ asset("storage/{$item->image}") }}" />
                                                                    <span onclick="removeImage(this)" class="remove_image_icon">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </span>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="card-block">
                                                    <div class="input-group mg-b-15" style="width:100%">
                                                        <textarea id="desc" name="desc">{{ isset($products) ? $products->description : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let assetPath = "{{ asset('storage/') }}/";
        $(function() {
            $('#name').on('input', function() {
                $(this).removeClass('error_input');
                $('.text_error__name').removeClass('text_error');
                $('.text_error__name').html('');
            });
            $('#inventory_number').on('input', function() {
                $(this).removeClass('error_input');
                $('.text_error__inventory_number').removeClass('text_error');
                $('.text_error__inventory_number').html('');
            });
            $('#price').on('input', function() {
                $(this).removeClass('error_input');
                $('.text_error__price').removeClass('text_error');
                $('.text_error__price').html('');
            });
            $('#status_id').on('change', function() {
                if ($(this).val() !== '') {
                    $(this).removeClass('error_input');
                    $('.text_error__status_id').removeClass('text_error');
                    $('.text_error__status_id').html('');
                }
            });
            $('#category_id').on('change', function() {
                if ($(this).val() !== '') {
                    $(this).removeClass('error_input');
                    $('.text_error__category_id').removeClass('text_error');
                    $('.text_error__category_id').html('');
                }
            });
        });
        CKEDITOR.replace('desc');
        CKEDITOR.on('instanceReady', function(evt) {
            var editor = evt.editor;
            editor.on('change', function(e) {
                var contentSpace = editor.ui.space('contents');
                var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
                var ckeditorFrame = ckeditorFrameCollection[0];
                var innerDoc = ckeditorFrame.contentDocument;
                var innerDocTextAreaHeight = $(innerDoc.body).height();
                console.log(innerDocTextAreaHeight);
            });
        });


        // ************************ Drag and drop ***************** //
        let dropArea = document.getElementById("drop-area");
        @if (isset($products))
            var fileList = {!! json_encode($products->product_image) !!}
            let product_id = {!! json_encode($products->product_id) !!}
        @else
            var fileList = [];
            let product_id = null;
        @endif
        const arrRemoveImage = [];

        // Prevent default drag behaviors
        ;
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false)
            document.body.addEventListener(eventName, preventDefaults, false)
        })

        // Highlight drop area when item is dragged over it
        ;
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false)
        })

        ;
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false)
        })

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false)

        function preventDefaults(e) {
            e.preventDefault()
            e.stopPropagation()
        }

        function highlight(e) {
            dropArea.classList.add('highlight')
        }

        function unhighlight(e) {
            dropArea.classList.remove('active')
        }

        function handleDrop(e) {
            var dt = e.dataTransfer
            var files = dt.files

            handleFiles(files)
        }

        let uploadProgress = []
        let progressBar = document.getElementById('progress-bar')

        function initializeProgress(numFiles) {
            progressBar.value = 0
            uploadProgress = []

            for (let i = numFiles; i > 0; i--) {
                uploadProgress.push(0)
            }
        }

        function updateProgress(fileNumber, percent) {
            uploadProgress[fileNumber] = percent
            let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
            console.debug('update', fileNumber, percent, total)
            progressBar.value = total
        }

        function handleFiles(files) {
            fileList.push(...files)
            files = [...files]
            initializeProgress(files.length) //load per image upload success
            files.forEach(previewFile) //review image in view
        }
        function renderImageHTML(file_List) {
            let html = "";
                for (let i = 0; i < file_List.length; i++) {
                html += `<div class="gallery__item" data-path="`+file_List[i].image+`">
                                <img src="` + assetPath+file_List[i].image + `"/>
                                <span onclick="removeImage(this)" class="remove_image_icon">
                                    <i class="fa-regular fa-trash-can"></i>
                                </span>
                        </div>`;
            
            $('#gallery').html(html);
            }
           
        }
        function previewFile(file) {
            let reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onloadend = function() {
                let img = document.createElement('img')
                let imageItem = `<div class="gallery__item">
                                    <img src="` + reader.result + `"/>
                                    <span onclick="removeImage(this)" class="remove_image_icon">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </span>
                                </div>`
                $('#gallery').append(imageItem)
            }
        }
        function removeImage(element) {
            var galleryItem = element.closest('.gallery__item'); //get element closest of span click has gallery__item Class
            
            if (galleryItem.hasAttribute('data-path')) {
                //if has data-path
                var imagePath = galleryItem.dataset.path; //get attr data-path gallery__item Class
                if (!arrRemoveImage.includes(imagePath)) {
                    //if not duplicate push to Array 
                    arrRemoveImage.push(imagePath);
                }
            }
            galleryItem.remove();
            console.log(arrRemoveImage)
        }
        
        function save() {
            var formData = new FormData();
            fileList.forEach((file, index) => {
                formData.append('images_list[]', file)
            })

            // console.log([...formData]);
            let description = CKEDITOR.instances.desc.getData();

            formData.append('name', $('#name').val())
            formData.append('inventory_number', $('#inventory_number').val())
            formData.append('price', $('#price').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('category_id', $('#category_id').val())
            formData.append('description', description)
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.product.store') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                },
                beforeSend: function() {
                },
                success: function(response) {
                    console.log(response)
                    const res = response.dataReponse;
                    Swal.fire({
                            icon: 'success',
                            title: 'Thêm Thành Công',
                            text: 'Đã thêm sản phẩm mới!!!',
                            confirmButtonText: 'OK',
                    }).then((result) => {
                        product_id = res.product_id;
                        fileList = res.file_list;
                        renderImageHTML(fileList)
                        $('.btnSubmit').attr('onclick', 'update()')
                        $('.btnSubmit').html('Cập Nhật')
                        var newUrl = window.location.pathname+'/'+product_id;
                        window.history.pushState(null, null, newUrl);
                    });
                    
                },
                error: function(e) {
                    console.log(e)
                    $.each(e.responseJSON, function(key, err_val) {
                        $('#'+key).addClass('error_input')
                        $('.text_error__'+key).addClass('text_error')
                        $('.text_error__'+key).html(err_val[0])
                    });
                }
            }); //end ajax
        }

        function update() {
            var formData = new FormData();

            
            fileList.forEach((file, index) => {
                formData.append('images_list[]', file)
            })
            let description = CKEDITOR.instances.desc.getData();

            formData.append('product_id', product_id)
            formData.append('name', $('#name').val())
            formData.append('inventory_number', $('#inventory_number').val())
            formData.append('price', $('#price').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('category_id', $('#category_id').val())
            formData.append('description', description)
            formData.append('arr_remove_image', JSON.stringify(arrRemoveImage))
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.product.update') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                },

                beforeSend: function() {
                },
                success: function(response) {
                    console.log(response)
                    const res = response.dataReponse;
                    Swal.fire({
                            icon: 'success',
                            title: 'Cập Nhật Thành Công',
                            text: 'Đã cập nhật lại sản phẩm!!!',
                            confirmButtonText: 'OK',
                    }).then((result) => {
                        fileList = res.file_list;
                        renderImageHTML(fileList)
                        arrRemoveImage = [];
                    });
                },
                error: function(e) {
                    console.log(e)
                    $.each(e.responseJSON, function(key, err_val) {
                        $('#'+key).addClass('error_input')
                        $('.text_error__'+key).addClass('text_error')
                        $('.text_error__'+key).html(err_val[0])
                    });
                }
            }); //end ajax
        }
    </script>

@endsection
