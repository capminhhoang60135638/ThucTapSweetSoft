
<?php
class Entitykhachhang{
    public $khachhang_id;
    public $khachhang_ho;
    public $khachhang_ten;
    public $khachhang_ngaysinh;
    public $khachhang_sdt;
    public $sodu;
    public $khachhang_loai;
    public $user_id;

    public function __construct($id,$ho,$ten,$ngaysinh,$sdt,$sodu,$loai,$user_id)
    {
        $this->khachhang_id=$id;
        $this->khachhang_ho=$ho;
        $this->khachhang_ten=$ten;
        $this->khachhang_ngaysinh=$ngaysinh;
        $this->khachhang_sdt=$sdt;
        $this->sodu=$sodu;
        $this->khachhang_loai=$loai;
        $this->user_id=$user_id;
        
    }

}

?>