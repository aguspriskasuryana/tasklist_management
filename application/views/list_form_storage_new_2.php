<?php $id = $this->session->userdata('user_data'); ?>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

#myInputx {
    border-box: box-sizing;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
}

#myInputx:focus {outline: 3px solid #ddd;}

.dropdownx {
    position: relative;
    display: inline-block;
}

.dropdownx-content {
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
}

.dropdownx-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdownx a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('form_storage_new/tambah_form_storage_new'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<a href="#" data-toggle="modal" data-target="#modal_form" class="btn btn-white btn-xs form" id="play" title="Klik untuk scan!"><i class="fa fa-search"></i> Search</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="2%">ID</th>
								<th width="4%">Id Status</th>
								<th width="1%">No Rak</th>
								<th width="5%">nama Barang</th>
								<th width="2%">SN</th>
								<th width="1%">Jumlah Awal</th>
								<th width="1%">Sisa</th>
								<th width="5%">Keterangan</th>
								<th width="2%">Owner</th>
								<th width="2%">Tanggal Buat</th>
								<th width="1%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($form_storage_new as $list){
						
					?>
						<tr>
							<td><?php echo $list['id_form_storage_new']?></td>
							<td><?php echo $tipe[$list['id_status']]?></td>
							<td><?php echo $list['no_rak']?></td>
							<td><?php echo $list['nama_barang']?></td>
							<td><?php echo $list['sn_barang']?></td>
							<td><?php echo $list['jumlah_awal']?></td>
							<td><?php echo $list['jumlah_akhir']?></td>
							<td><?php echo $list['merk']?></td>
							<td><?php echo $list['keterangan']?></td>
							<td><?php echo $list['time_now']?></td>

							<td>
							<a href="<?php echo site_url('form_storage_new/qrcodegenerator/'.$list['id_form_storage_new']); ?>" target="_blank" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-download"></i></a>
							<a href="<?php echo site_url('form_storage_new/edit_form_storage_new/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo site_url('form_storage_new/hapus/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
							</td>
							
						</tr>
							
						
					<?php
						
					}
					?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi Hapus!
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan Menghapus User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<div id="modal_form" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" id="stop" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

      		<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form_storage_new/get_list_form_storage_new2'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  	<input value="" id="id_inventory_tape" name="id_inventory_tape" type="hidden" >
				<input id="image-url" type="hidden" class="form-control" placeholder="Image url">	
				<div class="form-group">
				<label class="col-lg-2 control-label">Location</label>
					<div class="col-sm-6">
						 <select  id="camera-select"></select>
					</div>
				</div>
	
				<div class="form-group">
				<label class="col-lg-2 control-label"></label>
					<div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label"></label>
					<div class="col-sm-8">
                            <p id="scanned-QRX"></p>
							<input type="text" class="form-control" id="scanned-QR" value="<?php echo $scannedQR ?>" data-required="true" name="scanned-QR" >
					 </div>	
				</div>

				

				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Search</button>
				  </div>
				</div>
			  </form>
       
    </div>

  </div>
</div>

<script>
$(document).ready(function() {
	
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 50,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[9, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 2] }, 
                { "bSearchable": false, "aTargets": [2] }],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete').click(function(e) {
					e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
					//console.log(c);
					//if(c) window.location.href = $(e.delegateTarget).attr('href');
				});
				
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
});



$('.btn_delete').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>

<script type="text/javascript" src="<?php echo base_url('asset'); ?>/qrcode/js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--

<script src="<?php //echo base_url('asset'); ?>/js/app.data.js"></script>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>
        -->
        <script type="text/javascript" src="<?php echo base_url('asset'); ?>/qrcode/js/qrcodelib.js"></script>

  		<script src="<?php echo base_url('asset'); ?>/js/select2/select2.min.js" cache="false"></script>
        <script type="text/javascript" >
        	
        	/*!
 * WebCodeCamJS 2.7.0 javascript Bar code and QR code decoder 
 * Author: Tóth András
 * Web: http://atandrastoth.co.uk
 * email: atandrastoth@gmail.com
 * Licensed under the MIT license
 */
var WebCodeCamJS = function(element) {
    'use strict';
    this.Version = {
        name: 'WebCodeCamJS',
        version: '2.7.0',
        author: 'Tóth András',
    };
    var mediaDevices = window.navigator.mediaDevices;
    mediaDevices.getUserMedia = function(c) {
        return new Promise(function(y, n) {
            (window.navigator.getUserMedia || window.navigator.mozGetUserMedia || window.navigator.webkitGetUserMedia).call(navigator, c, y, n);
        });
    }
    HTMLVideoElement.prototype.streamSrc = ('srcObject' in HTMLVideoElement.prototype) ? function(stream) {
        this.srcObject = !!stream ? stream : null;
    } : function(stream) {
        if (!!stream) {
            this.src = (window.URL || window.webkitURL).createObjectURL(stream);
        } else {
            this.removeAttribute('src');
        }
    };
    var videoSelect, lastImageSrc, con, beepSound, w, h, lastCode;
    var display = Q(element),
        DecodeWorker = null,
        video = html('<video muted autoplay></video>'),
        sucessLocalDecode = false,
        localImage = false,
        flipMode = [1, 3, 6, 8],
        isStreaming = false,
        delayBool = false,
        initialized = false,
        localStream = null,
        options = {
            decodeQRCodeRate: 5,
            decodeBarCodeRate: 3,
            successTimeout: 500,
            codeRepetition: true,
            tryVertical: true,
            frameRate: 15,
            width: 320,
            height: 240,
            constraints: {
                video: {
                    mandatory: {
                        maxWidth: 1280,
                        maxHeight: 720
                    },
                    optional: [{
                        sourceId: true
                    }]
                },
                audio: false
            },
            flipVertical: false,
            flipHorizontal: false,
            zoom: 0,
            beep: '<?php echo base_url('asset'); ?>/qrcode/audio/beep.mp3',
            decoderWorker: '<?php echo base_url('asset'); ?>/qrcode/js/DecoderWorker.js',
            brightness: 0,
            autoBrightnessValue: 0,
            grayScale: 0,
            contrast: 0,
            threshold: 0,
            sharpness: [],
            resultFunction: function(res) {
                console.log(res.format + ": " + res.code);
            },
            cameraSuccess: function(stream) {
                console.log('cameraSuccess');
            },
            canPlayFunction: function() {
                console.log('canPlayFunction');
            },
            getDevicesError: function(error) {
                console.log(error);
            },
            getUserMediaError: function(error) {
                console.log(error);
            },
            cameraError: function(error) {
                console.log(error);
            }
        };

    function init() {
        var constraints = changeConstraints();
        try {
            mediaDevices.getUserMedia(constraints).then(cameraSuccess).catch(function(error) {
                options.cameraError(error);
                return false;
            });
        } catch (error) {
            options.getUserMediaError(error);
            return false;
        }
        return true;
    }

    function play() {
        if (!localImage) {
            if (!localStream) {
                init();
            }
            const p = video.play();
            if (p && (typeof Promise !== 'undefined') && (p instanceof Promise)) {
                p.catch(e => null);
            }
            delay();
        }
    }

    function stop() {
        delayBool = true;
        const p = video.pause();
        if (p && (typeof Promise !== 'undefined') && (p instanceof Promise)) {
            p.catch(e => null);
        }
        video.streamSrc(null);
        con.clearRect(0, 0, w, h);
        if (localStream) {
            for (var i = 0; i < localStream.getTracks().length; i++) {
                localStream.getTracks()[i].stop();
            }
        }
        localStream = null;
    }

    function pause() {
        delayBool = true;
        const p = video.pause();
        if (p && (typeof Promise !== 'undefined') && (p instanceof Promise)) {
            p.catch(e => null);
        }
    }

    function delay() {
        delayBool = true;
        if (!localImage) {
            setTimeout(function() {
                delayBool = false;
                if (options.decodeBarCodeRate) {
                    tryParseBarCode();
                }
                if (options.decodeQRCodeRate) {
                    tryParseQRCode();
                }
            }, options.successTimeout);
        }
    }

    function beep() {
        if (options.beep) {
            beepSound.play();
        }
    }

    function cameraSuccess(stream) {
        localStream = stream;
        video.streamSrc(stream);
        options.cameraSuccess(stream);
    }

    function cameraError(error) {
        options.cameraError(error);
    }

    function setEventListeners() {
        video.addEventListener('canplay', function(e) {
            if (!isStreaming) {
                if (video.videoWidth > 0) {
                    h = video.videoHeight / (video.videoWidth / w);
                }
                display.setAttribute('width', w);
                display.setAttribute('height', h);
                isStreaming = true;
                if (options.decodeQRCodeRate || options.decodeBarCodeRate) {
                    delay();
                }
            }
        }, false);
        video.addEventListener('play', function() {
            setInterval(function() {
                if (!video.paused && !video.ended) {
                    var z = options.zoom;
                    if (z === 0) {
                        z = optimalZoom();
                    }
                    con.drawImage(video, (w * z - w) / -2, (h * z - h) / -2, w * z, h * z);
                    var imageData = con.getImageData(0, 0, w, h);
                    if (options.grayScale) {
                        imageData = grayScale(imageData);
                    }
                    if (options.brightness !== 0 || options.autoBrightnessValue) {
                        imageData = brightness(imageData, options.brightness);
                    }
                    if (options.contrast !== 0) {
                        imageData = contrast(imageData, options.contrast);
                    }
                    if (options.threshold !== 0) {
                        imageData = threshold(imageData, options.threshold);
                    }
                    if (options.sharpness.length !== 0) {
                        imageData = convolute(imageData, options.sharpness);
                    }
                    con.putImageData(imageData, 0, 0);
                }
            }, 1E3 / options.frameRate);
        }, false);
    }

    function setCallBack() {
        DecodeWorker.onmessage = function(e) {
            if (localImage || (!delayBool && !video.paused)) {
                if (e.data.success === true && e.data.success != 'localization') {
                    sucessLocalDecode = true;
                    delayBool = true;
                    delay();
                    setTimeout(function() {
                        if (options.codeRepetition || lastCode != e.data.result[0].Value) {
                            beep();
                            lastCode = e.data.result[0].Value;
                            options.resultFunction({
                                format: e.data.result[0].Format,
                                code: e.data.result[0].Value,
                                imgData: lastImageSrc
                            });
                        }
                    }, 0);
                }
                if ((!sucessLocalDecode || !localImage) && e.data.success != 'localization') {
                    if (!localImage) {
                        setTimeout(tryParseBarCode, 1E3 / options.decodeBarCodeRate);
                    }
                }
            }
        };
        qrcode.callback = function(a) {
            if (localImage || (!delayBool && !video.paused)) {
                sucessLocalDecode = true;
                delayBool = true;
                delay();
                setTimeout(function() {
                    if (options.codeRepetition || lastCode != a) {
                        beep();
                        lastCode = a;
                        options.resultFunction({
                            format: 'QR Code',
                            code: a,
                            imgData: lastImageSrc
                        });
                    }
                }, 0);
            }
        };
    }

    function tryParseBarCode() {
        display.style.transform = 'scale(' + (options.flipHorizontal ? '-1' : '1') + ', ' + (options.flipVertical ? '-1' : '1') + ')';
        if (options.tryVertical && !localImage) {
            flipMode.push(flipMode[0]);
            flipMode.splice(0, 1);
        } else {
            flipMode = [1, 3, 6, 8];
        }
        lastImageSrc = display.toDataURL();
        DecodeWorker.postMessage({
            scan: con.getImageData(0, 0, w, h).data,
            scanWidth: w,
            scanHeight: h,
            multiple: false,
            decodeFormats: ["Code128", "Code93", "Code39", "EAN-13", "2Of5", "Inter2Of5", "Codabar"],
            rotation: flipMode[0]
        });
    }

    function tryParseQRCode() {
        display.style.transform = 'scale(' + (options.flipHorizontal ? '-1' : '1') + ', ' + (options.flipVertical ? '-1' : '1') + ')';
        try {
            lastImageSrc = display.toDataURL();
            qrcode.decode();
        } catch (e) {
            if (!localImage && !delayBool) {
                setTimeout(tryParseQRCode, 1E3 / options.decodeQRCodeRate);
            }
        }
    }

    function optimalZoom() {
        return video.videoHeight / h;
    }

    function getImageLightness() {
        var pixels = con.getImageData(0, 0, w, h),
            d = pixels.data,
            colorSum = 0,
            r, g, b, avg;
        for (var x = 0, len = d.length; x < len; x += 4) {
            r = d[x];
            g = d[x + 1];
            b = d[x + 2];
            avg = Math.floor((r + g + b) / 3);
            colorSum += avg;
        }
        return Math.floor(colorSum / (w * h));
    }

    function brightness(pixels, adjustment) {
        adjustment = adjustment === 0 && options.autoBrightnessValue ? Number(options.autoBrightnessValue) - getImageLightness() : adjustment;
        var d = pixels.data;
        for (var i = 0; i < d.length; i += 4) {
            d[i] += adjustment;
            d[i + 1] += adjustment;
            d[i + 2] += adjustment;
        }
        return pixels;
    }

    function grayScale(pixels) {
        var d = pixels.data;
        for (var i = 0; i < d.length; i += 4) {
            var r = d[i],
                g = d[i + 1],
                b = d[i + 2],
                v = 0.2126 * r + 0.7152 * g + 0.0722 * b;
            d[i] = d[i + 1] = d[i + 2] = v;
        }
        return pixels;
    }

    function contrast(pixels, cont) {
        var data = pixels.data;
        var factor = (259 * (cont + 255)) / (255 * (259 - cont));
        for (var i = 0; i < data.length; i += 4) {
            data[i] = factor * (data[i] - 128) + 128;
            data[i + 1] = factor * (data[i + 1] - 128) + 128;
            data[i + 2] = factor * (data[i + 2] - 128) + 128;
        }
        return pixels;
    }

    function threshold(pixels, thres) {
        var average, d = pixels.data;
        for (var i = 0, len = w * h * 4; i < len; i += 4) {
            average = d[i] + d[i + 1] + d[i + 2];
            if (average < thres) {
                d[i] = d[i + 1] = d[i + 2] = 0;
            } else {
                d[i] = d[i + 1] = d[i + 2] = 255;
            }
            d[i + 3] = 255;
        }
        return pixels;
    }

    function convolute(pixels, weights, opaque) {
        var sw = pixels.width,
            sh = pixels.height,
            w = sw,
            h = sh,
            side = Math.round(Math.sqrt(weights.length)),
            halfSide = Math.floor(side / 2),
            src = pixels.data,
            tmpCanvas = document.createElement('canvas'),
            tmpCtx = tmpCanvas.getContext('2d'),
            output = tmpCtx.createImageData(w, h),
            dst = output.data,
            alphaFac = opaque ? 1 : 0;
        for (var y = 0; y < h; y++) {
            for (var x = 0; x < w; x++) {
                var sy = y,
                    sx = x,
                    r = 0,
                    g = 0,
                    b = 0,
                    a = 0,
                    dstOff = (y * w + x) * 4;
                for (var cy = 0; cy < side; cy++) {
                    for (var cx = 0; cx < side; cx++) {
                        var scy = sy + cy - halfSide,
                            scx = sx + cx - halfSide;
                        if (scy >= 0 && scy < sh && scx >= 0 && scx < sw) {
                            var srcOff = (scy * sw + scx) * 4,
                                wt = weights[cy * side + cx];
                            r += src[srcOff] * wt;
                            g += src[srcOff + 1] * wt;
                            b += src[srcOff + 2] * wt;
                            a += src[srcOff + 3] * wt;
                        }
                    }
                }
                dst[dstOff] = r;
                dst[dstOff + 1] = g;
                dst[dstOff + 2] = b;
                dst[dstOff + 3] = a + alphaFac * (255 - a);
            }
        }
        return output;
    }

    function buildSelectMenu(selectorVideo, ind) {
        videoSelect = Q(selectorVideo);
        videoSelect.innerHTML = '';
        try {
            if (mediaDevices && mediaDevices.enumerateDevices) {
                mediaDevices.enumerateDevices().then(function(devices) {
                    devices.forEach(function(device) {
                        gotSources(device);
                    });
                    if (typeof ind === 'string') {
                        Array.prototype.find.call(videoSelect.children, function(a, i) {
                            if (a['innerText' in HTMLElement.prototype ? 'innerText' : 'textContent'].toLowerCase().match(new RegExp(ind, 'g'))) {
                                videoSelect.selectedIndex = i;
                            }
                        });
                    } else {
                        videoSelect.selectedIndex = videoSelect.children.length <= ind ? 0 : ind;
                    }
                }).catch(function(error) {
                    options.getDevicesError(error);
                });
            } else if (mediaDevices && !mediaDevices.enumerateDevices) {
                html('<option value="true">On</option>', videoSelect);
                options.getDevicesError(new NotSupportError('enumerateDevices Or getSources is Not supported'));
            } else {
                throw new NotSupportError('getUserMedia is Not supported');
            }
        } catch (error) {
            options.getDevicesError(error);
        }
    }

    function gotSources(device) {
        if (device.kind === 'video' || device.kind === 'videoinput') {
            var face = (!device.facing || device.facing === '') ? 'unknown' : device.facing;
            var text = device.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
            html('<option value="' + (device.id || device.deviceId) + '">' + text + '</option>', videoSelect);
        }
    }

    function changeConstraints() {
        var constraints = JSON.parse(JSON.stringify(options.constraints));
        if (videoSelect && videoSelect.length !== 0) {
            switch (videoSelect[videoSelect.selectedIndex].value.toString()) {
                case 'true':
                    if (navigator.userAgent.search("Edge") == -1 && navigator.userAgent.search("Chrome") != -1) {
                        constraints.video.optional = [{
                            sourceId: true
                        }];
                    } else {
                        constraints.video.deviceId = undefined;  
                    }
                    break;
                case 'false':
                    constraints.video = false;
                    break;
                default:
                    if (navigator.userAgent.search("Edge") == -1 && navigator.userAgent.search("Chrome") != -1) {
                        constraints.video.optional = [{
                            sourceId: videoSelect[videoSelect.selectedIndex].value
                        }];
                    } else if (navigator.userAgent.search("Firefox") != -1) {
                        constraints.video.deviceId = {
                            exact: videoSelect[videoSelect.selectedIndex].value
                        };
                    } else {
                         constraints.video.deviceId = videoSelect[videoSelect.selectedIndex].value;
                    }
                    break;
            }
        }
        constraints.audio = false;
        return constraints;
    }

    function Q(el) {
        if (typeof el === 'string') {
            var els = document.querySelectorAll(el);
            return typeof els === 'undefined' ? undefined : els.length > 1 ? els : els[0];
        }
        return el;
    }

    function decodeLocalImage(url) {
        stop();
        localImage = true;
        sucessLocalDecode = false;
        var img = new Image();
        img.onload = function() {
            con.fillStyle = '#fff';
            con.fillRect(0, 0, w, h);
            con.drawImage(this, 5, 5, w - 10, h - 10);
            tryParseQRCode();
            tryParseBarCode();
        };
        if (url) {
            download("temp", url);
            decodeLocalImage();
        } else {
            if (FileReaderHelper) {
                new FileReaderHelper().Init('jpg|png|jpeg|gif', 'dataURL', function(e) {
                    img.src = e.data;
                }, true);
            } else {
                alert("fileReader class not found!");
            }
        }
    }

    function download(filename, url) {
        var a = window.document.createElement('a'),
            bd = document.querySelector('body');
        bd.appendChild(a);
        a.setAttribute('href', url);
        a.setAttribute('download', filename);
        a.click();
        bd.removeChild(a);
    }

    function mergeRecursive(target, source) {
        if (typeof target !== 'object') {
            target = {};
        }
        for (var property in source) {
            if (source.hasOwnProperty(property)) {
                var sourceProperty = source[property];
                if (typeof sourceProperty === 'object') {
                    target[property] = mergeRecursive(target[property], sourceProperty);
                    continue;
                }
                target[property] = sourceProperty;
            }
        }
        for (var a = 2, l = arguments.length; a < l; a++) {
            mergeRecursive(target, arguments[a]);
        }
        return target;
    }

    function html(innerhtml, appendTo) {
        var item = document.createElement('div');
        if (innerhtml) {
            item.innerHTML = innerhtml;
        }
        if (appendTo) {
            appendTo.appendChild(item.children[0]);
            return item;
        }
        return item.children[0];
    }

    function NotSupportError(message) {
        this.name = 'NotSupportError';
        this.message = (message || '');
    }
    NotSupportError.prototype = Error.prototype;
    return {
        init: function(opt) {
            if (initialized) {
                return this;
            }
            if (!display || display.tagName.toLowerCase() !== 'canvas') {
                console.log('Element type must be canvas!');
                alert('Element type must be canvas!');
                return false;
            }
            con = display.getContext('2d');
            if (opt) {
                options = mergeRecursive(options, opt);
                if (options.beep) {
                    beepSound = new Audio(options.beep);
                }
            }
            display.width = w = options.width;
            display.height = h = options.height;
            qrcode.sourceCanvas = display;
            initialized = true;
            setEventListeners();
            DecodeWorker = new Worker(options.decoderWorker);
            if (options.decodeQRCodeRate || options.decodeBarCodeRate) {
                setCallBack();
            }
            return this;
        },
        play: function() {
            localImage = false;
            setTimeout(play, 100);
            return this;
        },
        stop: function() {
            stop();
            return this;
        },
        pause: function() {
            pause();
            return this;
        },
        buildSelectMenu: function(selector, ind) {
            buildSelectMenu(selector, ind ? ind : 0);
            return this;
        },
        getOptimalZoom: function() {
            return optimalZoom();
        },
        getLastImageSrc: function() {
            return display.toDataURL();
        },
        decodeLocalImage: function(url) {
            decodeLocalImage(url);
        },
        isInitialized: function() {
            return initialized;
        },
        getWorker: function () {
            return DecodeWorker;
        },
        options: options
    };
};

        </script>
        <script type="text/javascript">
            
            /*!
 * WebCodeCamJS 2.1.0 javascript Bar code and QR code decoder 
 * Author: Tóth András
 * Web: http://atandrastoth.co.uk
 * email: atandrastoth@gmail.com
 * Licensed under the MIT license
 */
(function(undefined) {
    "use strict";

    function Q(el) {
        if (typeof el === "string") {
            var els = document.querySelectorAll(el);
            return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
        }
        return el;
    }
    var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    var scannerLaser = Q(".scanner-laser"),
        imageUrl = new Q("#image-url"),
        play = Q("#play"),
        //scannedImg = Q("#scanned-img"),
        scannedQR = Q("#scanned-QR"),
        scannedQRX = Q("#scanned-QRX"),
        //grabImg = Q("#grab-img"),
        //decodeLocal = Q("#decode-img"),
        //pause = Q("#pause"),
        stop = Q("#stop"),
        contrast = Q("#contrast"),
        contrastValue = Q("#contrast-value"),
        zoom = Q("#zoom"),
        zoomValue = Q("#zoom-value"),
        brightness = Q("#brightness"),
        brightnessValue = Q("#brightness-value"),
        threshold = Q("#threshold"),
        thresholdValue = Q("#threshold-value"),
        sharpness = Q("#sharpness"),
        sharpnessValue = Q("#sharpness-value"),
        grayscale = Q("#grayscale"),
        grayscaleValue = Q("#grayscale-value"),
        flipVertical = Q("#flipVertical"),
        flipVerticalValue = Q("#flipVertical-value"),
        flipHorizontal = Q("#flipHorizontal"),
        flipHorizontalValue = Q("#flipHorizontal-value");
    var args = {
        autoBrightnessValue: 100,
        resultFunction: function(res) {
            [].forEach.call(scannerLaser, function(el) {
                fadeOut(el, 0.5);
                setTimeout(function() {
                    fadeIn(el, 0.5);
                }, 300);
            });
            //scannedImg.src = res.imgData;
            var inputvolid = document.getElementById("scanned-QR").value;
			document.getElementById("scanned-QR").value = inputvolid+"'"+res.code+"',";
            scannedQRX[txt] = res.code;
        },
        getDevicesError: function(error) {
            var p, message = "Error detected with the following parameters:\n";
            for (p in error) {
                message += p + ": " + error[p] + "\n";
            }
            alert(message);
        },
        getUserMediaError: function(error) {
            var p, message = "Error detected with the following parameters:\n";
            for (p in error) {
                message += p + ": " + error[p] + "\n";
            }
            alert(message);
        },
        cameraError: function(error) {
            var p, message = "Error detected with the following parameters:\n";
            if (error.name == "NotSupportedError") {
                var ans = confirm("Your browser does not support getUserMedia via HTTP!\n(see: https:goo.gl/Y0ZkNV).\n You want to see github demo page in a new window?");
                if (ans) {
                    window.open("https://andrastoth.github.io/webcodecamjs/");
                }
            } else {
                for (p in error) {
                    message += p + ": " + error[p] + "\n";
                }
                alert(message);
            }
        },
        //cameraSuccess: function() {
        //    grabImg.classList.remove("disabled");
        //}
    };
    var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back").init(args);
    //decodeLocal.addEventListener("click", function() {
     //   Page.decodeLocalImage();
    //}, false);
    play.addEventListener("click", function() {
        if (!decoder.isInitialized()) {
            scannedQR[txt] = "Scanning ...";
        } else {
            scannedQR[txt] = "Scanning ...";
            decoder.play();
        }
    }, false);
    //grabImg.addEventListener("click", function() {
    //    if (!decoder.isInitialized()) {
    //        return;
    //    }
    //    var src = decoder.getLastImageSrc();
        //scannedImg.setAttribute("src", src);
    //}, false);
    //pause.addEventListener("click", function(event) {
    //    scannedQR[txt] = "Paused";
    //    decoder.pause();
    //}, false);
    stop.addEventListener("click", function(event) {
        //grabImg.classList.add("disabled");
        scannedQR[txt] = "Stopped";
        decoder.stop();
    }, false);
    Page.changeZoom = function(a) {
        if (decoder.isInitialized()) {
            var value = typeof a !== "undefined" ? parseFloat(a.toPrecision(2)) : zoom.value / 10;
            zoomValue[txt] = zoomValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.zoom = value;
            if (typeof a != "undefined") {
                zoom.value = a * 10;
            }
        }
    };
    Page.changeContrast = function() {
        if (decoder.isInitialized()) {
            var value = contrast.value;
            contrastValue[txt] = contrastValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.contrast = parseFloat(value);
        }
    };
    Page.changeBrightness = function() {
        if (decoder.isInitialized()) {
            var value = brightness.value;
            brightnessValue[txt] = brightnessValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.brightness = parseFloat(value);
        }
    };
    Page.changeThreshold = function() {
        if (decoder.isInitialized()) {
            var value = threshold.value;
            thresholdValue[txt] = thresholdValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.threshold = parseFloat(value);
        }
    };
    Page.changeSharpness = function() {
        if (decoder.isInitialized()) {
            var value = sharpness.checked;
            if (value) {
                sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": on";
                decoder.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
            } else {
                sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": off";
                decoder.options.sharpness = [];
            }
        }
    };
    Page.changeVertical = function() {
        if (decoder.isInitialized()) {
            var value = flipVertical.checked;
            if (value) {
                flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": on";
                decoder.options.flipVertical = value;
            } else {
                flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": off";
                decoder.options.flipVertical = value;
            }
        }
    };
    Page.changeHorizontal = function() {
        if (decoder.isInitialized()) {
            var value = flipHorizontal.checked;
            if (value) {
                flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": on";
                decoder.options.flipHorizontal = value;
            } else {
                flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": off";
                decoder.options.flipHorizontal = value;
            }
        }
    };
    Page.changeGrayscale = function() {
        if (decoder.isInitialized()) {
            var value = grayscale.checked;
            if (value) {
                grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": on";
                decoder.options.grayScale = true;
            } else {
                grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": off";
                decoder.options.grayScale = false;
            }
        }
    };
    //Page.decodeLocalImage = function() {
    //    if (decoder.isInitialized()) {
    //        decoder.decodeLocalImage(imageUrl.value);
    //    }
    //    imageUrl.value = null;
    //};
    var getZomm = setInterval(function() {
        var a;
        try {
            a = decoder.getOptimalZoom();
        } catch (e) {
            a = 0;
        }
        if (!!a && a !== 0) {
            Page.changeZoom(a);
            clearInterval(getZomm);
        }
    }, 500);

    function fadeOut(el, v) {
        el.style.opacity = 1;
        (function fade() {
            if ((el.style.opacity -= 0.1) < v) {
                el.style.display = "none";
                el.classList.add("is-hidden");
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }

    function fadeIn(el, v, display) {
        if (el.classList.contains("is-hidden")) {
            el.classList.remove("is-hidden");
        }
        el.style.opacity = 0;
        el.style.display = display || "block";
        (function fade() {
            var val = parseFloat(el.style.opacity);
            if (!((val += 0.1) > v)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }
    document.querySelector("#camera-select").addEventListener("change", function() {
        if (decoder.isInitialized()) {
            decoder.stop().play();
        }
    });
}).call(window.Page = window.Page || {});

        </script>

        <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunctionx() {
    document.getElementById("myDropdownx").classList.toggle("show");
}
function myFunctionclick(a) {
	document.getElementById("myInputx").value=a;
	var input, filter, ul, li, a, i;
    input = document.getElementById("myInputx");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdownx");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        
            a[i].style.display = "none";
        
    }
}
function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInputx");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdownx");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
</script>

