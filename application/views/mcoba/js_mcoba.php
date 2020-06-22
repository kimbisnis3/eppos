<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;

   $(function() {
     select2()
   })

   var app = new Vue({
       el: '#app',
       data: {
           url: '',
           input: {},
           datatable: [],
           filter : {},
           fields : [
             {
               column : "nama",
               label : "Nama",
             },
             {
               column : "ket",
               label : "Keterangan",
             },
             {
               column : "datei",
               label : "Datei",
             },
             {
               column : "datei",
               label : "Datei",
             },
           ]
       },
       methods: {
         getall: function() {
           axios
             .get(`${apiurl}/getall`, { params : {
               limit : this.filter.limit,
               // page : this.filter.page,
               // offset : (this.page - 1) * this.limit,
             }})
             .then(response => (this.datatable = response.data.data))
             console.log(this.filter.limit)
         },
         savedata: function() {
           if (this.input.id == '' || !this.input.id) {
             this.url = `${apiurl}/savedata`
           } else {
             this.url = `${apiurl}/updatedata`
           }
          axios({
            method: 'post',
            url: this.url,
            data: this.input,
            transformRequest: function (data) {
              return $.param(data)
            }
          })
          .then((res) =>{
            if (res.data.sukses == 'success') {
              $('#modal-data').modal('hide')
              this.getall()
              toastr.success('Data Disimpan')
            }
          })
         },
         add_data: function() {
           this.input = {}
           $('#modal-data').modal('show')
         },
         edit_data: function(id) {
           this.input.id = id
           axios
             .get(`${apiurl}/getrow?id=${id}`)
             .then(response => (
               this.input = response.data
             ))
             $('#modal-data').modal('show')
          },
          ordertb : function(column) {
            console.log(column)
          },
          fun : function() {
            setTimeout(function(){
                    console.log("asdsadas")
                }, 150);

          }
       },
       mounted () {
         this.getall()
      }
   })


</script>
