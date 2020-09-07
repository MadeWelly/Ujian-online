    //NAVIGASI ESSAY
    var url = 'http://localhost/Made/ujian_online/upload/';
    var navEsay = document.querySelector("#totalEsay").getAttribute("total-esay");
    for (var i = 0; i <= navEsay; i++) 
    {
     $('#btnEsay'+i).click(function() {
         $('#detailEssay').modal('show');
         var soal = $(this).attr('data-soal');
         var id_e = $(this).attr('data-id');
         var fileEsay = $(this).attr('file-esay');
         $('#id_essay').val(id_e);
         $("#soal_e").html(soal);

         if (fileEsay == false) {
          console.log('fileay');
          $("#file_esay").attr("hidden",'');
         }else {
          console.log('fiEsay');
          $("#file_esay").removeAttr("hidden");
         }

         $("#file_esay").attr('src', url + fileEsay);
         $(".modal-backdrop").removeClass("modal-backdrop");
         var zinde = document.getElementById('zindex');
          zinde.style.zIndex = "0";
         //   document.getElementById("id_e").innerHTML = id;
     })
    }

// NAVIGASI PG
   var navPg = document.querySelector("#totalPg").getAttribute("data-nilai");
    for (var i = 0; i <= navPg; i++) 
    {  
     $('#btnPg'+i).click(function() {
         $('#detailPg').modal('show')
         $(".modal-backdrop").removeClass("modal-backdrop");
         var zinde = document.getElementById('zindex');
         zinde.style.zIndex = "0";
         var id = $(this).attr('data-id');
         var tgl = $(this).attr('data-tgl');
         var file = $(this).attr('data-file')
         var fileA = $(this).attr('file-a')
         var fileB = $(this).attr('file-b')
         var fileC = $(this).attr('file-c')
         var fileD = $(this).attr('file-d')
         var fileE = $(this).attr('file-e')
         var dosen = $(this).attr('data-namadosen');
         var matkul = $(this).attr('data-matkul');
         var ujian = $(this).attr('data-ujian');
         var j_soal = $(this).attr('data-j_soal');
         var benar = $(this).attr('data-benar');
         var salah = $(this).attr('data-salah');
         // console.log(file);
         if (file == false) {
          // console.log('hh');
          document.getElementById("file_soal").setAttribute("hidden",'');
         }else {
          document.getElementById("file_soal").removeAttribute("hidden");
         }

          if (fileA == false) {
          // console.log(value);
          document.getElementById("fileA").setAttribute("hidden",'');
         }else {
          document.getElementById("fileA").removeAttribute("hidden");
         }if (fileB == false) {
          // console.log(value);
          document.getElementById("fileB").setAttribute("hidden",'');
         }else {
          document.getElementById("fileB").removeAttribute("hidden");
         }if (fileC == false) {
          // console.log(value);
          document.getElementById("fileC").setAttribute("hidden",'');
         }else {
          document.getElementById("fileC").removeAttribute("hidden");
         }if (fileD == false) {
          // console.log(value);
          document.getElementById("fileD").setAttribute("hidden",'');
         }else {
          document.getElementById("fileD").removeAttribute("hidden");
         }if (fileE == false) {
          // console.log(value);
          document.getElementById("fileE").setAttribute("hidden",'');
         }else {
          document.getElementById("fileE").removeAttribute("hidden");
         }
         
         $('#hapusData').val(id);
          $("#tgl").html(tgl);
          $("#file_soal").attr('src',url + file);
          $("#fileA").attr('src',url + fileA);
          $("#fileB").attr('src',url + fileB);
          $("#fileC").attr('src',url + fileC);
          $("#fileD").attr('src',url + fileD);
          $("#fileE").attr('src',url + fileE);

         $("#jawaban_A").html(dosen);
         $("#jawaban_B").html(matkul);
         $("#jawaban_C").html(ujian);
         $("#jawaban_D").html(j_soal);
         $("#jawaban_E").html(benar);
         $("#salah").html(salah);
         // document.getElementById("nilai").innerHTML = nilai;
         
     })
    }