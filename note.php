<!-- Lọc dữ liệu
    ->get() là trả về tất cả
    ->get()->all() là chỉ trả về cái mảng (là dữ liệu mà chúng ta cần để dễ thao tác, chuyển đối tượng tử dữ liệu sang dạng mảng)
    ->select("...","...") là trả về những trường dữ liệu mong muốn
    ->where("name", "value") là trả về có điều kiện (với name là tên cột và value là giá trị của cột đó)
    '<>' là khác trong query builder
    And ==> where()->where()
    Or ==> where()->orwhere()
    Lọc dữ liệu có sắp xếp với orderBy('name', 'desc') (hoặc asc(sắp xếp tăng dần và desc thì ngược lại))
    ->inRandomOrder() trả về ngẫu nhiên
    ->limit(...) lấy về bao nhiêu
    ->offset(...) lấy về bắt đầu từ vị trí nào

    Lấy dữ liệu từ hai bảng:
    - vdmh:
    DB:table("products)
    ->select("products.name as product_name", "price", "categories.name as categories_name")
    ->join("categories", "products.categories_id", "=", "categories.id")
    ->orderBy("id", "desc")
    ->get()
    ->all();
    với Join gồm 3 tham số truyền vào:
        - ts1: tên bảng thứ 2 muốn lấy thông tin
        - ts2: khóa phụ của bảng nhiều (ở đây là bảng thứ nhất)
        - ts3: bằng khóa chính của bảng 1 (ở đây là bảng thứ 2)
    Với dữ liệu của 2 bảng có tên cột trùng nhau thì ta chỉ rõ tới cột cần lấy và gán cho nó 1 bí danh thông qua từ khóa as)

    Mỗi migration quản lý 1 bảng
    Mỗi seeder (1 lớp) thêm dữ liệu vào 1 bảng
    - Tạo: php artisan make:seeder CategoriySeeder
    - Viết câu lệnh thêm mới ở bên trong phương thức run
    Nếu ta thêm mới mà dữ liệu bên trong chưa được xóa thì khi thêm mới sẽ bị lỗi => DB::table("...").delete(); (xóa sạch data )
    Định nghĩa Seeder trong file DatabaseSeeder để sử dụng $this->call([CategorySeeder::class,..,...]);
    Để chạy Seeder ==> php artisan db:seed

    count(...) lấy số lượng phần tử trong mảng

    Ta sử dụng foreach để duyệt mảng (hiển thị ra các sản phẩm)
     vd: @foreach($products as $product) .... @endforeach
    với $products là mảng từ controller truyền sang và $product là biến (ta tự đặt tên) tương ứng với từng phần tử trong mảng
    Khai báo vùng làm việc của php trong file views ==> {{...}} (vd:{{$product->price}})
-->

<!--
    Tạo file LoginRequest ==> php artisan make:request LoginRequest
    Nếu muốn Edit lại Error thì ta bắt buộc phải viết trong phương thức messages
    -     public function authorize()
            {
                return true;
            }
    sửa lại password phải ở dạng bcrypt("...")

 -->

 <!--
    Tên Model là 1 lớp luôn luôn ở dạng số ít
    - Nếu chưa có bảng thì khi tạo Model ta tạo luôn Migration tương ứng (nó sẽ tự động tạo migration ở dạng số nhiều) ==> php artisan make:model Test -m
    ta tạo thêm bảng mới ==> migration
    mô tả lại để thao tác với bảng ==>Model
    thêm dữ liệu vào bảng Seeder (thêm dữ liệu vào 1 bảng cụ thể ==> php artisan db:seed --class=NameSeeder)

    Tạo Model //migration
    Khi lọc dữ liệu ta không muốn hiển thị ra 1 trường nào đó (ví dụ như bảng users là password) thì ta cho vào hidden ==>protected $hidden = ["password"];
    Lấy dữ liệu ở dạng mảng ==> toArray();
    Lấy dữ liệu luôn luôn phải có get()
  -->
<!--
    dự án lớn dùng query builder vì Model thì nó chậm
    Liên kết từ bảng chính tới bảng tách là liên kết thuận
    Ngược lại là liên kết nghịch đảo
    2. Liên kết từ bảng 1 tới bảng nhiều là liên kết thuận
    Ngược lại là nghịch đảo
    hasOne(ts1, ts2, ts3);
    - ts1: liên kết với bảng nào
    - ts2: khóa ngoại là gì
    - ts3: khóa chính ở bảng chính

    ->all() là trả về 1 mảng bên trong là 1 object (vd lấy giá trị => $product->price)
    ->toArray() là trả về 1 mảng, bên trong là 1 mảng (vd lấy giá trị => $product["price"])

    -> Để xử lý phân trang ta sử dụng phương thức paginate(num_page); (nó thay thế cho ->get->all() và trả về 1 mảng giống như all())
    vender chuứa html được ẩn đi
    ở đây ta muốn hiển thị cấu trúc html của thanh phân trang => php artisan vendor:public --tag=laravel-pagination
    Hiển thị và sử dụng thanh phân trang ==> vd: {{$products->links("pagination::bootstrap-4")}}
 -->
 <!--

    HELPERS là những hàm toàn cục cho phép ta gọi ở bất cứ đâu trong Blade Template (.ejs)

    - Với helpers (file và thư mục đặt tên tùy ý vị trí tùy ý) quan trong là ta định nghĩa cho nó
    - Để tránh viết trùng các hàm ta cần kiểm tra sự tồn tại trước khi khai báo (if(!function_exists("nameFunction"))){function nameFunction(){...}}
    - Lưu trữ các tính năng, chức năng,... (có thể là lớp hoặc function) và có thể lưu trữ được nhiều rất chức năng
    B1: Tạo Thư mục Helpers (có thể đặt tên bất kì) bên trong là File helpers (có thể đặt tên bất kỳ) (khuyến khích nên để là con của thư mục app)
    B2: viết logic code (đầu tiên kiểm tra tên Helpers xem đã tồn tại chưa rồi mới tiến hành khai báo và viết logic code)
    B3: định nghĩa Helpers (Sử dụng composer để tự động Load file)
            Code mh: định nghĩa trong autoload:
                "files":[
                            "app/Helpers/helpers.php"
                        ],
    B4: reset lại ==> composer dump-autoload

    Sử dụng đệ quy để làm Menu đa cấp
  -->
  <!--
    Facade chỉ sử dụng cho Controller
    Illuminate mới là gọi vào
   -->
   <!--
    - 1 trong những điều kiện khi thêm mới dữ liệu là trường code không được trùng khi đó ta sử dụng "code" => "required|unique:products",
    (kiểm tra giá trị trùng lặp của trường code trong bảng products)
    - Nhưng khi ta cập nhật dữ liệu mà vẫn sử dụng cái bên trên khi đó chắc chắn sẽ luôn báo lỗi là đã mã code đã tồn tại
    Khi đó ta sử dụng cú pháp sau:
            "code"=> [
                "required",
                Rule::unique("products")->ignore($this->id),
            ],
        Trong đó •	ignore($this->id) là phương thức nhận vào id của bản ghi để loại nó khỏi danh sách kiểm tra

    - Tích hợp CKEDITOR
            B1: tải trên ckeditor.com
            B2: giải nén và cho vào thư mục public
            B3: Vào phần head để gọi tời file ckeditor.js bằng cặp thẻ script
            B4: Vào nơi muốn sử dụng. Thêm id cho textarea (id="nameId")
            B5: <script>CKEDITOR.replace("nameId")</script>
    -->

<!--
    Ở trong dự án này ta sẽ gặp trường hợp lỗi khi viết Router thì sẽ gặp lỗi 2 lớp có tên trùng nhau
        - ProductController là lớp xuất hiện cả trong Admin và Site nên khi use vào nó sẽ xảy ra lỗi
        => Khi đó ta sẽ tiến hành đặt cho nó 1 cái tên mới và gọi theo cái tên mới này để phân biệt 2 lớp ProductController với nhau
        ==> use App\Http\Controllers\Site\Product\ProductController as SiteProductController;
 -->
