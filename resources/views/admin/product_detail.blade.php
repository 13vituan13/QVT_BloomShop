@extends('layouts.admin.master')
@section('title', $title)
@section('content')
<style>
    #drop-area {
        border: 2px dashed #ccc;
        border-radius: 20px;
        width: 480px;
        font-family: sans-serif;
        margin: 100px auto;
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
        margin-bottom: 10px;
        margin-right: 10px;
        vertical-align: middle;
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
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>
                                            Sản Phẩm</a></li>
                                    <li><a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Ảnh</a></li>
                                    <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Mô Tả</a>
                                    </li>
                                </ul>
                                
                                        <div class="text-center custom-pro-edt-ds">
                                            <button type="button"
                                                class="btn btn-ctl-bt waves-effect waves-light m-r-10"
                                                onclick="save()">Thêm Mới
                                            </button>
                                        </div>
                            </div>
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-fan"
                                                            aria-hidden="true"></i></span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Tên Sản Phẩm"
                                                        value="{{ isset($products) ? $products->name : '' }}">
                                                </div>

                                                <select id="category_id" name="select"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="">Chọn Loại Sản Phẩm</option>
                                                    @if (count($category_list) > 0)
                                                        @foreach ($category_list as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                @if(isset($products) && $products->category_id == $category->category_id)
                                                                {{'selected'}}
                                                                @endif>
                                                                    {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <div class="input-group">
                                                    <select id="status_id" name="select"
                                                        class="form-control pro-edt-select form-control-primary">
                                                        <option value="">Chọn Trạng Thái</option>
                                                        @if (count($status_list) > 0)
                                                            @foreach ($status_list as $status)
                                                                <option value="{{ $status->status_id }}"
                                                                    @if(isset($products) && $products->status_id == $status->status_id)
                                                                    {{'selected'}}
                                                                    @endif
                                                                    >{{ $status->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
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
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-dollar-sign"
                                                            aria-hidden="true"></i></span>
                                                    <input id="price" type="text" name="price" class="form-control"
                                                        placeholder="Đơn Giá"
                                                        value="{{ isset($products) ? $products->price : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                {{-- <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="pro-edt-img">
                                                            <img src="img/new-product/5-small.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="product-edt-pix-wrap">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">TT</span>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Label Name">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="product-edt-remove">
                                                                                <button type="button"
                                                                                    class="btn btn-ctl-bt waves-effect waves-light">Remove
                                                                                    <i class="fa fa-times"
                                                                                        aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                
                                                <div id="drop-area">
                                                    <form class="my-form">
                                                        <p>Upload multiple files with the file dialog or by dragging and
                                                            dropping images onto the dashed region</p>
                                                        <input type="file" id="fileElem" multiple accept="image/*"
                                                            onchange="handleFiles(this.files)">
                                                        <label class="button" for="fileElem">Select some files</label>
                                                    </form>
                                                    <progress id="progress-bar" max=100 value=0></progress>
                                                    <div id="gallery" >
                                                        @if(isset($products) &&  count($products->product_image) > 0)
                                                            @foreach ($products->product_image as $item)
                                                                <img src="{{ asset("storage/{$item->image}") }}" alt="" />  
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
                                                <div class="input-group mg-b-15">
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
        $(function() {

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
        let dropArea = document.getElementById("drop-area")
        let fileList = [];

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
            initializeProgress(fileList.length) //load per image upload success
            fileList.forEach(previewFile) //review image in view

            // files = [...files]
            // initializeProgress(files.length)
            // files.forEach(uploadFile)
            // files.forEach(previewFile)
        }

        function previewFile(file) {
            let reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onloadend = function() {
                let img = document.createElement('img')
                img.src = reader.result
                document.getElementById('gallery').appendChild(img)
            }
        }

        // function uploadFile(file, i) {
        //     var url = 'https://api.cloudinary.com/v1_1/joezim007/image/upload'
        //     var xhr = new XMLHttpRequest()
        //     var formData = new FormData()
        //     xhr.open('POST', url, true)
        //     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

        //     // Update progress (can be used to show progress indicator)
        //     xhr.upload.addEventListener("progress", function(e) {
        //         updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
        //     })

        //     xhr.addEventListener('readystatechange', function(e) {
        //         if (xhr.readyState == 4 && xhr.status == 200) {
        //             updateProgress(i, 100) // <- Add this
        //         } else if (xhr.readyState == 4 && xhr.status != 200) {
        //             // Error. Inform the user
        //         }
        //     })

        //     formData.append('upload_preset', 'ujpu6gyk')
        //     formData.append('file', file)
        //     xhr.send(formData)
        // }

        function save() {
            var formData = new FormData();
            fileList.forEach((file, index) => {
                formData.append('images_list[]', file)
                // formData.append('name_' + index, file.name)
                // formData.append('size_' + index, file.size)
                // formData.append('type_' + index, file.type)
                // formData.append('last_modified_' + index, file.lastModified)
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
                    'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
                },
                beforeSend: function() {},
                success: function(response) {
                    console.log(response)
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }
    </script>

@endsection
