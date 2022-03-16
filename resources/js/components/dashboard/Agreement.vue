<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

            <div class="hotmeal-main-section hotmeal-best-offerfull">
                <div class="container" style="width: 850px;">
                    <div class="row">

                        <dashboard-statusbar :user="user"/>
                 
                    </div>
                </div>
            </div>

            <section id="pdf">
                 <embed WMODE="transparent" src="/images/agreement.pdf"  style="border:1px solid #999;" type="application/pdf" width="100%" height="500px" />
            </section>

            <div class="form-check">
                <label class="form-check-label declare">
                &nbsp;&nbsp;Above is the sample contract template you are signing.
                </label>
            </div><br>

            <form @submit.prevent="onSubmit">
                <div class="input-group ">
                     <span class="input-group-text"><b>Draw  Your Signature</b></span> <br/><br/>

                    <div class="input-group-prepend" style="border: solid 1px">
                        <VueSignaturePad
                            width="500px"
                            height="300px"
                            ref="signaturePad"
                        />
                    <!-- <span class="input-group-text"><b>Upload  Your Signature</b></span>
                    <br>
                    <br>
                    <input type="file" class="custom-file-input" id="inputGroupFile01" ref="file_sig" required> -->
                    </div>
                </div>
                <button style="margin-top: 10px" type="button" class="btn btn-primary btn-sm" @click="clearSignature()">Clear</button>

                <div style="margin: 39px -89px;">
                    <button class="my-btn">Submit</button> 
                </div>
            </form>             
            
        </div>

    </div>    
  
</template>

<script>


    export default {
        data () {
            return {
                user: '',
            }
        },
        created: function(){ 
                axios.get('/api/v1/profile')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.$data.user = res.data.success.data.user
                       // window.location.href = '/chef/dashboard'
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })
        },
       
        methods: {
            onSubmit() {

                 const { isEmpty, data } = this.$refs.signaturePad.saveSignature()
                    console.log(isEmpty)
                    console.log(data)

                if(isEmpty) {
                    this.$toasted.show('Draw your signature before submit.',{duration: 2000})   
                    return
                }     


                //return;

                let block = data.split(";");
                // Get the content type of the image
                let contentType = block[0].split(":")[1];// In this case "image/gif"
                // get the real base64 content of the file
                let realData = block[1].split(",")[1];

                let pdf = this.b64toBlob(realData, 'image/png');

               // let pdf =  this.$refs.file_sig.files[0]    
                var formData = new FormData()
                formData.append('file_sig', pdf, 'signature.png') 
                this.$toasted.show('Agreement Submiting...',{duration: 2000})   
               
                axios.post('/api/v1/pdf/agreement', formData, {
                    headers: {
                            'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.$toasted.show('Agreement signed successfully.',{duration: 1000})  
                         window.location.href = '/chef/agreement-approval'

                    } else { console.log('error...')
                        this.$toasted.show('Something went wrong!',{duration: 1000})  

                    }  
                }).catch(err => {
                    this.$toasted.show('Something went wrong!',{duration: 1000})  
                })
            },

            b64toBlob(b64Data, contentType, sliceSize) {
                contentType = contentType || '';
                sliceSize = sliceSize || 512;

                var byteCharacters = atob(b64Data);
                var byteArrays = [];

                for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                    var slice = byteCharacters.slice(offset, offset + sliceSize);

                    var byteNumbers = new Array(slice.length);
                    for (var i = 0; i < slice.length; i++) {
                        byteNumbers[i] = slice.charCodeAt(i);
                    }

                    var byteArray = new Uint8Array(byteNumbers);

                    byteArrays.push(byteArray);
                }

                var blob = new Blob(byteArrays, {type: contentType});
                return blob;
            },

            clearSignature() {
                this.$refs.signaturePad.clearSignature();
            }


            
        }
    }
</script>
