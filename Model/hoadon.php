<?php
class HoaDon{
    public $hoadon_id,$nhanvien_id,$khgui_id;
    public $khnhan_id,$giaodich_date,$noidung,$tien;
    


    //////
    public function __construct($hoadon_id,$nhanvien_id,$khgui_id)
    {
        $this->hoadon_id=$hoadon_id;
        $this->nhanvien_id=$nhanvien_id;
        $this->khgui_id=$khgui_id;
    }
}

?>