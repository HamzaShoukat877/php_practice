(function ($) {

    $('.delete_product_btn').on("click",function (){
        var id = $(this).val()
        Swal.fire({
            title: "Are You Sure",
            text: "Once You deleted, you will not be able to recover",
            icon: "warning",
            showCancelButton: true,
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    method:"POST",
                    url : "code.php",
                    data: {
                        'product_id':id,
                        'delete_product_btn':true,
                    },
                    success:function (response){

                        if(response == 200){
                            console.log("success")
                            Swal.fire({
                                title: 'Success!',
                                text: 'Product Deleted successfully',
                                icon: 'success',
                            });
                            $("#products_table").load(location.href + " #products_table")

                        } else if(response == 500){
                            swal("Error!","something went wrong","error")
                        }
                    }
                })
            } else{
                Swal.fire("your imaginary file is safe")
            }
            }
        )
    })

}(jQuery));