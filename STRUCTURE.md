# app: Thư mục chứa mã nguồn của ứng dụng Laravel.
|__ [Console]: Chứa các tác vụ dòng lệnh (command) của ứng dụng. 
|__ [Exceptions]: Chứa các lớp xử lý ngoại lệ và quy tắc xử lý lỗi.
|__ [Helpers]: Chứa các hàm hỗ trợ, tiện ích cho ứng dụng.
|__ [Http]: Chứa các thành phần liên quan đến HTTP.
    |__ **Api**: Chứa các tệp tin xử lý yêu cầu API.
    |__ **Controllers**: [Điều khiển] - nơi xử lý logic của các yêu cầu HTTP và tương tác với dữ liệu.
    |__ **Middleware**: [Trung gian] - được sử dụng để xử lý các yêu cầu trước khi nó đến đích cuối cùng, cho phép kiểm tra và xử lý các điều kiện, quyền truy cập, và nhiều hơn nữa.
    |__ **Requests**: [Yêu cầu] - Đây là nơi để xác thực và xử lý dữ liệu đầu vào từ các yêu cầu HTTP trước khi chúng được xử lý bởi controllers.
    |__ *Kernel.php*: Là nơi cấu hình các middleware và ghi đè các thao tác trung tâm cho việc xử lý yêu cầu HTTP trong ứng dụng. Nó quy định danh sách các middleware được áp dụng và cấu hình route groups trong ứng dụng.
|__ [Models]: Chứa các mô hình dữ liệu (models) của ứng dụng.
|__ [Providers]: Chứa các dịch vụ (services) và cấu hình. Chứa lớp dịch vụ sử dụng để đăng ký.
    |__ *AppServiceProvider.php*: Dịch vụ ứng dụng -> có thể sử dụng tệp tin này để thêm các liên kết, đăng ký singleton, thực hiện các cấu hình khác cho ứng dụng.
    |__ *AuthServiceProvider.php*: Dịch vụ xác thực và quyền truy cập trong ứng dụng -> có thể sử dụng tệp tin này để đăng ký các quy tắc xác thực tùy chỉnh, xác thực người dùng và các cấu hình xác thực khác.
    |__ *BroadcastServiceProvider.php*: Dịch vụ phát sóng trong ứng dụng -> có thể sử dụng tệp tin này để đăng ký các kênh phát sóng sự kiện và cấu hình phát sóng sự kiện thời gian thực.
    |__ *EventServiceProvider.php*: Dịch vụ sự kiện trong ứng dụng -> có thể sử dụng tệp tin này để đăng ký các sự kiện và các bộ xử lý sự kiện tương ứng.
    |__ *RouteServiceProvider.php*: Dịch vụ định tuyến trong ứng dụng _> có thể sử dụng tệp tin này để định nghĩa các tuyến đường, định tuyến tiền tố, các tuyến đường động và các cấu hình định tuyến khác.
|__ [Repositories]: Chứa các lớp xử lý dữ liệu và truy vấn cơ sở dữ liệu. 
|__ [Services]: Chứa các lớp cung cấp dịch vụ cho ứng dụng.
|__ [Tests]: Chứa các bài kiểm tra cho ứng dụng.
    |__ **Feature**: Tập trung vào việc kiểm tra tính năng. Ex: kiểm tra các luồng làm việc toàn diện, từ đầu đến cuối, để đảm bảo tính đúng đắn và hoạt động chính xác của các tính năng.
    |__ **Unit**: Tập trung vào việc kiểm tra các đơn vị nhỏ hơn. Ex: kiểm tra các phần tử riêng lẻ, như các phương thức, lớp hay các hàm, để đảm bảo chúng hoạt động đúng và trả về kết quả mong muốn.
# bootstrap: Chứa các tệp tin khởi động ban đầu cho ứng dụng Laravel.
# config: Chứa các tệp tin cấu hình cho ứng dụng.
|__ *app.php*: Chứa cấu hình chung (ex: tên ứng dụng, môi trường, timezone, providers,aliases..).
|__ *auth.php*: Chứa cấu hình xác thực và quyền truy cập (ex: cấu hình xác thực người dùng, đăng nhập, đăng ký và đặt lại mật khẩu).
|__ *broadcasting.php*: Chứa cấu hình cho hệ thống phát sóng (ex: cấu hình kênh, trình điều khiển và cấu hình phát sóng sự kiện thời gian thực).
|__ *cache.php*: Chứa cấu hình cho hệ thống bộ nhớ cache (ex: cấu hình trình điều khiển cache và thời gian sống của cache).
|__ *cors.php*: Chứa cấu hình cho CORS (Cross-Origin Resource Sharing), cho phép hoặc từ chối các yêu cầu từ các nguồn khác nhau.
|__ *database.php*: Chứa cấu hình cho CSDL (ex: cấu hình kết nối cơ sở dữ liệu, cấu hình Eloquent ORM,...).
|__ *filesystems.php*: Chứa cấu hình cho hệ thống tệp tin (ex: cấu hình ổ đĩa tệp tin, các trình điều khiển tệp tin,...).
|__ *hashing.php*: Chứa cấu hình cho việc băm mật khẩu trong quá trình xác thực người dùng.
|__ *logging.php*: Chứa cấu hình cho việc ghi log (ex: cấu hình các kênh log, mức log,...).
|__ *mail.php*: Chứa cấu hình cho hệ thống gửi email (ex: cấu hình các trình gửi email, kênh gửi email,...).
|__ *path.php*: Chứa cấu hình cho các đường dẫn ứng dụng.
|__ *queue.php*: Chứa cấu hình cho hệ thống hàng đợi công việc (ex: cấu hình trình điều khiển hàng đợi, cấu hình hàng đợi,...).
|__ *sanctum.php*: Chứa cấu hình cho Sanctum, một gói mở rộng xác thực API của Laravel, bao gồm cấu hình cho token API và cấu hình CORS cho xác thực API.
|__ *services.php*: Chứa cấu hình cho các dịch vụ, bao gồm cấu hình cho các dịch vụ của bên thứ ba (ex: trình điều khiển SMTP, trình điều khiển tin nhắn, trình điều khiển xác thực,...).
|__ *session.php*: Chứa cấu hình cho hệ thống phiên (ex: cấu hình phiên, trình điều khiển phiên,...).
|__ *view.php*: Chứa cấu hình cho hệ thống giao diện (ex: cấu hình thư mục chứa giao diện, trình điều khiển giao diện,...).
# database: Chứa các tệp tin liên quan đến cơ sở dữ liệu
|__ [factories]: Các file tạo dữ liệu mẫu
|__ [migrations]: Các file di chuyển cơ sở dữ liệu.
|__ [seeders]: Các file gieo giống dữ liệu.
# public: Chứa các tệp tin và thư mục truy cập trực tiếp từ bên ngoài
|__ *.htaccess*: Là tệp tin cấu hình Apache được sử dụng để cấu hình các quy tắc và thiết lập cho máy chủ web. Được sử dụng để đảm bảo các URL của ứng dụng được xử lý thông qua tệp tin index.php và các quy tắc khác để đảm bảo an ninh và bảo mật.
|__ *favicon.ico*: Là một biểu tượng nhỏ được hiển thị trên thanh địa chỉ của trình duyệt hoặc trong các tab.Trong Laravel, tệp tin favicon.ico được đặt trong thư mục public và trình duyệt sẽ tự động tải nó khi truy cập vào trang web.
|__ *index.php*: Là điểm khởi đầu cho ứng dụng Laravel. Khi một yêu cầu được gửi đến máy chủ web, máy chủ sẽ chạy tệp tin index.php. Tệp tin này sẽ khởi tạo ứng dụng Laravel và chuyển quyền kiểm soát sang framework để xử lý yêu cầu và trả về kết quả tương ứng.
|__ *robots.txt*: Là tệp tin được sử dụng để cung cấp hướng dẫn cho các công cụ tìm kiếm về cách tìm và xử lý các trang web. Có thể chỉnh sửa tệp tin để kiểm soát cách công cụ tìm kiếm duyệt trang web bằng cách đặt quy tắc và hạn chế truy cập.
# resources: Chứa các tệp tin tài nguyên của ứng dụng.
|__ [assets]: Chứa các tệp tin tài nguyên như CSS, tệp tin, hình ảnh và JavaScript.
    |__ **css**
    |__ **files**
    |__ **images**
    |__ **js**
|__ [lang]: Chứa các tệp tin ngôn ngữ để định nghĩa, giúp hỗ trợ đa ngôn ngữ.
|__ [views]: Chứa các tệp tin giao diện, viết bằng Laravel Blade Template.
    |__ **admin**: Chứa các tệp tin giao diện dành cho trang quản trị.
        |__ *home.blade.php*
    |__ **layouts**: Chứa các tệp tin giao diện chung.
        |__ **admin**
            |__ *footer.blade.php*
            |__ *header.blade.php*
            |__ *master.blade.php*
    |__ **user**
            |__ *footer.blade.php*
            |__ *header.blade.php*
            |__ *master.blade.php*
    |__ **user**: Chứa các tệp tin giao diện dành cho trang người dùng.
        |__ *home.blade.php*
# routes: Chứa các tệp tin định tuyến của ứng dụng.
|__ *api.php*: Xác định các URL và điều hướng các request đến các controllers hoặc closure xử lý API.
|__ *channels.php*: Đăng ký các kênh (channels) của ứng dụng, phản hồi theo thời gian thực. 
|__ *console.php*: Định nghĩa các tác vụ dòng lệnh (console tasks) để chạy trên terminal.
|__ *web.php*: Xác định các URL và điều hướng các request đến các controllers hoặc closure xử lý web.
# storage: Chứa các tệp tin lưu trữ tạm thời của ứng dụng Laravel.
|__ [app]: Chứa các tệp tin lưu trữ tạm thời của ứng dụng Laravel.
|__ [framework]: Chứa các tệp tin và thư mục liên quan đến framework Laravel.
    |__ **cache**: Chứa các tệp tin cache được tạo ra bởi ứng dụng, như cache dữ liệu hoặc tệp tin tạm thời.
    |__ **sessions**: Chứa các tệp tin phiên (session) của người dùng, được sử dụng để lưu trữ thông tin phiên làm việc của người dùng.
    |__ **tests**: Chứa các tệp tin liên quan đến quá trình kiểm thử (testing) của ứng dụng Laravel.
    |__ **views**: Chứa các tệp tin cache của các giao diện (views) đã được biên dịch, giúp tăng tốc độ hiển thị giao diện.
|__ [logs]: Chứa các tệp tin log (ghi nhật ký) của ứng dụng, ghi lại các thông tin về hoạt động và sự kiện xảy ra trong quá trình chạy ứng dụng.

# vendor: Chứa các thư viện và gói phụ thuộc của ứng dụng, được quản lý bởi Composer.

# .editorconfig: Tệp tin định dạng code cho các biên tập viên code. 

# .env: Tệp tin cấu hình môi trường, chứa các cài đặt cho CSDL, bảo mật và các cấu hình khác.

# .env.example: Tệp tin mẫu cho .env, cung cấp các giá trị mặc định cho các biến môi trường.

# .gitattributes: Tệp tin cấu hình Git cho ứng dụng.

# .gitignore: Tệp tin chứa danh sách các tệp tin và thư mục không nên được theo dõi bởi Git.

# artisan: Tệp tin thực thi lệnh Artisan để thao tác với ứng dụng Laravel.

# composer.json: Các tệp tin cấu hình và khóa phiên bản cho Composer.

# composer.lock: Các tệp tin cấu hình và khóa phiên bản cho Composer.

# package.json: Cấu hình cho npm và các gói JavaScript.

# phpunit.xml: Cấu hình cho PHPUnit để thực hiện các bài kiểm tra.

# README.md: Chứa thông tin hướng dẫn cho dự án, được hiển thị trên GitHub và các nền tảng khác.

# STRUCTURE.md: Chứa mô tả về cấu trúc và tổ chức của ứng dụng.

# vite.config.js: Cấu hình Vite, một công cụ xây dựng và phát triển ứng dụng web nhanh chóng.

------------------------------------------------------------------------------------------------
# app
|__ [Console]
|__ [Exceptions]
|__ [Helpers]
|__ [Http]
    |__ **Api**
    |__ **Controllers**
    |__ **Middleware**
    |__ **Requests**
    |__ *Kernel.php*
|__ [Models]
|__ [Providers]
    |__ *AppServiceProvider.php*
    |__ *AuthServiceProvider.php*
    |__ *BroadcastServiceProvider.php*
    |__ *EventServiceProvider.php*
    |__ *RouteServiceProvider.php*
|__ [Repositories]
|__ [Services]
|__ [Tests]
    |__ **Feature**
    |__ **Unit**
# bootstrap
# config
|__ *app.php*
|__ *auth.php*
|__ *broadcasting.php*
|__ *cache.php*
|__ *cors.php*
|__ *database.php*
|__ *filesystems.php*
|__ *hashing.php*
|__ *logging.php*
|__ *mail.php*
|__ *path.php*
|__ *queue.php*
|__ *sanctum.php*
|__ *services*
|__ *session.php*
|__ *view.php*
# database
|__ [factories]
|__ [migrations]
|__ [seeders]
# public
|__ *.htaccess*
|__ *favicon.ico*
|__ *index.php*
|__ *robots.txt*
# resources
|__ [assets]
    |__ **css**
    |__ **files**
    |__ **images**
    |__ **js**
|__ [lang]
|__ [views]
    |__ **admin**
        |__ *home.blade.php*
    |__ **layouts**
        |__ **admin**
            |__ *footer.blade.php*
            |__ *header.blade.php*
            |__ *master.blade.php*
        |__ **user**
            |__ *footer.blade.php*
            |__ *header.blade.php*
            |__ *master.blade.php*
        |__ **user**
            |__ *home.blade.php*
# routes
|__ *api.php*
|__ *channels.php*
|__ *console.php*
|__ *web.php*
# storage
|__ [app]
|__ [framework]
    |__ **cache**
    |__ **sessions**
    |__ **tests**
    |__ **views**
|__ [logs]
# vendor
# .editorconfig
# .env
# .env.example
# .gitattributes
# .gitignore
# artisan
# composer.json
# composer.lock
# package.json
# phpunit.xml
# README.md
# STRUCTURE.md
# vite.config.js



    // "require": {
    //     "php": "^8.1",
    //     "guzzlehttp/guzzle": "^7.2",
    //     "laravel/framework": "^10.10",
    //     "laravel/sanctum": "^3.2",
    //     "laravel/tinker": "^2.8"
    // },