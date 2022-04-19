$(".delete-confirm").on('click', function(e){
    e.preventDefault(); 
    
    
    if (confirm("Do you want to delete whole information?")) {
        var id = $('.delete-confirm').data("id");
        var token = $('input[name="_token"]').val();
        
        $.ajax(
            {
                type: "DELETE",
                url: "users"+'/'+id,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (data){
                    if(data.status === 'deleted' ) {
                        $('.table-row-' + id).remove();
                    }
                }
            });
    }
    
   
   
    
    
    
    
});
       

   





















// function deleteHistory() {

//     const token = document.head.querySelector('meta[name="csrf-token"]');
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

//     let id = document.getElementById('delete').value;

//       axios.delete('/users', {
//         data: {id: id}
//     }).then((response) => {
//         console.log(response)
//     }).catch((error) => {
//         console.log(error.response.data)
//     });
// }

