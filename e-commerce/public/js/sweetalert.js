$(document).ready(function(){
    // Category
    $('.sweetAlertCategory').click(function(evt){
        evt.preventDefault();
        let name = $(this).data('name')
        let category_id = $(this).data('id');
        Swal.fire({
            title: `ต้องการลบ <span style='color: red'>  ${name} </span> หรือไม่ ?`,
            text: "ถ้าลบเเล้วไม่สามารถกู้คืนข้อมูลได้",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#CC0000',
            confirmButtonText: 'ยกเลิก',
            cancelButtonText: "ตกลง",
            cancelButtonColor: '#009900 ',

            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then((WillDelete)=>{
            if(!WillDelete.isConfirmed && WillDelete.dismiss != "backdrop"){
                window.location = 'category/delete/'+category_id
            }
        })
    })

    //Product
    $('.sweetAlertProduct').click(function(evt){
        evt.preventDefault();
        let name = $(this).data('name')
        let category_id = $(this).data('id');
        Swal.fire({
            title: `ต้องการลบ <span style='color: red'>  ${name} </span> หรือไม่ ?`,
            text: "ถ้าลบเเล้วไม่สามารถกู้คืนข้อมูลได้",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#CC0000',
            confirmButtonText: 'ยกเลิก',
            cancelButtonText: "ตกลง",
            cancelButtonColor: '#009900 ',

            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then((WillDelete)=>{
            if(!WillDelete.isConfirmed && WillDelete.dismiss != "backdrop"){
                window.location = 'product/delete/'+category_id
            }
        })
    })
});
