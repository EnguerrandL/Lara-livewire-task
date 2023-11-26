import './bootstrap';

console.log('test')
document.addEventListener('alert', (event) =>{

            let data = event.detail


            Swal.fire({
                position: data.position,
                icon: data.icon,
                title: data.title,
                text: data.text,

              });
              
    });



 