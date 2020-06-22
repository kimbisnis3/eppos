<script type="text/javascript">
    var php_base_url = '<?php echo base_url() ?>';

    $(function() {
      toastr.options = {
        "timeOut": 1500
      }
    })

    function initsummernote(){
      $('.summernote').summernote({
        height: 200,
        toolbar: [
          ['para', ['ul', 'ol', 'paragraph','style']],
          ['fontsize', ['fontsize']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough']],
          ['color', ['color']],
          ['height', ['height']]
        ]
      })
    }

    function getakses(path) {
      $.ajax({
          url: `<?php echo base_url(); ?>_akses/getakses`,
          type: "POST",
          data: {
              url: path,
          },
          dataType: "JSON",
          success: function(data) {
              if (data.add != 1 ) { $('.elm-add').remove() }
              if (data.edit != 1 ) { $('.elm-edit').remove() }
              if (data.del != 1 ) { $('.elm-del').remove() }
              if (data.option != 1 ) { $('.elm-option').remove() }
              if (data.other != 1 ) { $('.elm-other').remove() }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
    }

    function bctrl(val, btn)
    {
        if (val == 1) {
          return btn
        } else {
          return ''
        }
    }

    function btn_aktif(param)
    {
        return `<button type="button" class="btn btn-success btn-flat btn-sm elm-option" name="button" onclick="aktif_data('${param}')"><i class="fas fa-check"></i></button>`
    }

    function btn_edit(param)
    {
        return `<button type="button" class="btn btn-warning btn-flat btn-sm elm-edit" name="button" onclick="edit_data('${param}')"><i class="fas fa-edit"></i></button>`
    }

    function btn_delete(param)
    {
        return `<button type="button" class="btn btn-danger btn-flat btn-sm elm-del" name="button" onclick="hapus_data('${param}')"><i class="fa fa-trash"></i></button>`
    }

    function btn_action(param)
    {
        return btn_edit(param) +' '+btn_delete(param)
    }

    function fv(inputform, inputname){
      let xd = 0
      let arrform = []
      let arrempty
      $.each(inputform, function(i,v) {
        if (inputname.includes(v['name'])) {
          if(v['value'] == ''){
            xd = xd + 1
            arrform.push(v['name'])
          }
        }
      })
      let obj = {
        count : xd,
        empty : arrform
      }
      return obj
    }

    function _add_data(form, modal, title) {
        state = 'add';
        $(form)[0].reset();
        $('#img-preview').remove();
        $('.select2').trigger('change');
        $(modal).modal('show');
        $(`${modal} .modal-title`).text(title);
    }

    function _savedata_i(form,url,modal) {
      $.ajax({
          url: url,
          type: "POST",
          data: $(form).serializeArray(),
          dataType: "JSON",
          success: function(data) {
              if (data.sukses == 'success') {
                  $(modal).modal('hide');
                  refresh();
                  toastr.success('Data Berhasil Disimpan')
              } else if (data.sukses == 'fail') {
                  $(modal).modal('hide');
                  refresh();
                  toastr.success('No Changed')
              } else if (data.sukses == 'duplicated') {
                  refresh();
                  toastr.error('Username Sudah Digunakan')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
    }

    function _savefile_i(form,url,modal) {
        var formData = new FormData($(form)[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: "JSON",
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.sukses == 'success') {
                    $(modal).modal('hide');
                    refresh();
                    toastr.success('Data Berhasil Disimpan')
                } else if (data.sukses == 'fail') {
                    $(modal).modal('hide');
                    refresh();
                    toastr.success('No Changed')
                } else if (data.sukses == 'duplicated') {
                    refresh();
                    toastr.error('Username Sudah Digunakan')
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Internal Error')
            }
        });
    }

    function _delete_data(id, url) {
      $.confirm({
        closeIcon: true,
        icon: 'fa fa-trash',
        title: 'Hapus Data',
        type: 'red',
        content: 'Yakin menghapus data ?',
        buttons: {
          cancel: {
            text: 'Tidak',
            btnClass: 'btn-default',
            keys: ['esc'],
          },
          oke: {
            text: 'Ya',
            btnClass: 'btn-danger',
            keys: ['enter'],
            action: function(){
              $.post(url, { id: id }, function(data) {
                if (data.sukses == 'success') {
                    refresh();
                    toastr.success('Data Berhasil Dihapus')
                } else if (data.sukses == 'fail') {
                    refresh();
                    toastr.error('Data Gagal Dihapus')
                }
              },'json');
            }
          },
        }
      })
    }

    function _aktif_data(id, url) {
      $.confirm({
        closeIcon: true,
        icon: 'fa fa-check',
        title: 'Aktifkan Data',
        type: 'blue',
        content: 'Yakin mengubah data ?',
        buttons: {
          cancel: {
            text: 'Tidak',
            btnClass: 'btn-default',
            keys: ['esc'],
          },
          oke: {
            text: 'Ya',
            btnClass: 'btn-success',
            keys: ['enter'],
            action: function(){
              $.post(url, { id: id }, function(data) {
                if (data.sukses == 'success') {
                    refresh();
                    toastr.success('Data Berhasil Dihapus')
                } else if (data.sukses == 'fail') {
                    refresh();
                    toastr.error('Data Gagal Dihapus')
                }
              },'json');
            }
          },
        }
      })
    }

    function active_induk(induk) {
      $(`.induk-li-${induk}`).addClass("menu-open")
      $(`.induk-${induk}`).addClass("active")
    }

    function active_anak(anak) {
      $(`.anak-${anak}`).addClass("active")
    }

    function showimage(url) {
	    return `<img onerror="this.src='${php_base_url}assets/gambar/noimage.png'" style="max-width : 60px; max-height : 40px;" src="${php_base_url}${url}" >`
	   }

    function imgError(image) {
	    image.onerror = "";
	    image.src = `${php_base_url}assets/gambar/noimage.png`;
	    return true;
	   }

     function aktifstatus(x) {
       if (x == "1" || x == "t" || x == true) {
         return `<span class="badge badge-success">Aktif</span>`
       } else {
         return `<span class="badge badge-danger">Tidak Aktif</span>`
       }
     }

     function setstatus(data,yes,no) {
       if (data == "1" || data == "t" || data == true) {
         return `<span class="badge badge-success">${yes}</span>`
       } else {
         return `<span class="badge badge-danger">${no}</span>`
       }
     }

     function setMonth(prop, days, tipe = '') {
    		if ((tipe == 'min') || ( tipe == '')) {
    			let date = moment().subtract(days, 'days').format("DD MMM YYYY");
    			$(prop).val(date)
    		} else if(tipe == 'plus') {
    			let date = moment().add(days, 'days').format("DD MMM YYYY");
    			$(prop).val(date)
    		}
    }

    function dpicker() {
  	    $('.datepicker').datepicker({
  	        autoclose: true,
  	        format: 'dd M yyyy'
  	    })
  	}

     function angka(val) {
       return numeral(val).format('0,0')
     }

     function inputangka(evt) {
       var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
           return false;
       return true;
     }

     function select2() {
       $('.select2').select2({
         theme: 'bootstrap4',
         placeholder: 'Select an option',
         allowClear: true
       })
  	}

    function select2ajax(selector, url, id, label, params = '', min_input = 0) {
      $(selector).select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        minimumInputLength: min_input,
        allowClear: true,
        ajax: {
          url: url,
          type: "get",
          dataType: 'json',
          delay: 250,
          data: function(params) {
            return {
              q: params.term
            };
          },
          processResults: function(data) {
            return {
              results: $.map(data, function(obj) {
                return {
                  id: obj[id],
                  text: obj[label]
                };
              })
            };
          }
        }
      });
    }

    function imgpreview(input, prop) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#img-preview').remove();
              $('#image-preview').append('<img id="img-preview" src="'+e.target.result+'"/>');
          }
          reader.readAsDataURL(input.files[0]);
      }
    }

    function ceknull(x) {
  	    if ($('[name="' + x + '"]').val() == '' || $('[name="' + x + '"]').val() == null) {
  	        showNotif('', 'Kolom Wajib Diisi', 'danger');
  	        $('[name="' + x + '"]').focus()
  	        return true
  	    } else {
  	        return false
  	    }
  	}

    function tanggal(date) {
      return moment(date).format('DD MMM YYYY')
    }

</script>
