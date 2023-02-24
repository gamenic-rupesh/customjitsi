
<div id="ausculaide_app" class="ausculaide_container" _ontouchstart="alert(''); return false;"
	    _ontouchmove="event.preventDefault();" style="" data-cache_version="aus-cache{{session('cache_version')}}">
		<div id="zoom_adjustment" data-width="0" data-height="0" style="display:none"> </div>
	    <div class="main_wrapper ausculaide" ontouchmove="event.preventDefault()" ontouchstart="">
	        <div class="main ausculaide">
	            <!-- 左エリア -->
	            <div class="left-pane" style="display:none">
	                <div class="balloon">
	                    <div class="explanation">
	                        <div class="explanation-inner">
	                            <div class="scroll-view" ontouchmove="">ここに説明テキストが入ります</div>
	                            <div id="tmp_text" style="display:none"></div>
	                        </div>
	                    </div>
	                    <div class="list-area">
	                        <div class="list-area-inner">
	                            <ul id="main-menu">
	                                <li><a href="javascript:void(0);">ここにメインメニューが入ります</a></li>
	                            </ul>
	                            <button id="btn-result" onclick="openResult();"></button>
	                        </div>
	                    </div>
	                </div>
	                <div class="left-panel-content panel-content" ontouchmove="enablePinch()" style="display: none;">
	                    <div class="viewable_image_area">
	                        <img class="viewable_image" src="">
	                        <div style="width:40px;height:40px;background-color: red"></div>
	                    </div>
	                </div>
	                <div class="left-video-area" style="display: none;"></div>
	            </div>

	            <!-- Bodymap -->
	            <div id="">
	                <div class="bodymap-frame type-cardio" ontouchmove="">
	                    <div class="bodymap_audio_wrapper" style="display:none;"></div>
	                    <div id="bodymap-cardiac" class="bodymap">
							<div id="body_image_container" class="bodymap-front" _style="display:none">
	                        </div>
	                    </div>
	                    <div id="bodymap-bowel" class="bodymap" style="display: none;">
	                        <div class="bodymap-front" _style="display:none">
	                            <div id="bowelsounds" class="bowel bowelsounds sound-target" style="opacity: 0;"></div>
	                        </div>
	                    </div>
	                    <div id="bodymap-question" style="display: none;"></div>
	                    <button id="btn-bodymap-close" style="display:none;" class="center"></button>
	                    <button id="btn-bodymap-ok" style="display:none;"></button>
	                    <div class="message"></div>
	                    <div id="stethoscope" ondrag="pauseAudio()">
							<div >
	                 			<div class="label" style="display: none;"></div>
							 </div>
	                    </div>
	                    <div class="loading-wrapper" style="display: none;">
	                        <div class="loading">
	                            <div class="sk-fading-circle">
	                                <div class="sk-circle1 sk-circle"></div>
	                                <div class="sk-circle2 sk-circle"></div>
	                                <div class="sk-circle3 sk-circle"></div>
	                                <div class="sk-circle4 sk-circle"></div>
	                                <div class="sk-circle5 sk-circle"></div>
	                                <div class="sk-circle6 sk-circle"></div>
	                                <div class="sk-circle7 sk-circle"></div>
	                                <div class="sk-circle8 sk-circle"></div>
	                                <div class="sk-circle9 sk-circle"></div>
	                                <div class="sk-circle10 sk-circle"></div>
	                                <div class="sk-circle11 sk-circle"></div>
	                                <div class="sk-circle12 sk-circle"></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <!-- bodymap-farme -->

	            <!-- 右エリア -->
	            <div class="right-area" style="display:none; height:auto;">
	                <div class="dual-panel-wrapper" _style="display:none;">
	                    <div class="panel">
	                        <div class="panel-header">
	                            <div class="inner">学習タイトル</div>
	                        </div>
	                        <div class="panel-content-wrapper">
	                            <div class="panel-content"></div>
	                            <div class="panel-sub-content"></div>
	                        </div>
	                    </div>
	                </div>
	            </div> <!-- /right-area -->
			</div>
		</div>

		<?php
			$path = basename(request()->path());	
		?>
		<!-- @if(str_contains($path,'answer'))
		<button id="btn-case-top"></button>
		@endif -->

		<div class="footer ausculaide" class="ausculaide" ontouchmove="event.preventDefault()">
			<div>
				<button id="btn-case-top"></button>
				@if(!str_contains($path,'answer'))
				<div class="points">
					<button id="btn-point-A" onclick="pauseAudio()" class="btn-points" disabled>A<br>2RSB</button>
					<button id="btn-point-P" onclick="pauseAudio()" class="btn-points" disabled>P<br>2LSB</button>
					<button id="btn-point-T" onclick="pauseAudio()" class="btn-points" disabled>T<br>4LSB</button>
					<button id="btn-point-M" onclick="pauseAudio()" class="btn-points" disabled>M<br>Apex</button>
				</div>
				@endif
				@if($monitoring_flg == 1)
				<span class="reshare">
					<button id="reshare-btn" style="color:#fff">share screen</button>
				</span>
				@endif
			</div>
		</div>
	</div>
	{{-- <div class="heatmap_action_container" style="position: relative;z-index: 9;">
		<div style="display: inline-block; margin:5px"><a href="javascript:void(0)" id="showHM" >show heatmap data</a></div>
		<div style="display: inline-block; margin:5px"><a href="javascript:void(0)" id="clearHM" >clear heatmap data</a></div>
		<div style="display: inline-block; margin:5px"><a href="javascript:void(0)" id="save" >save</a></div>
	</div> --}}
	
	{{-- @if (str_contains(request()->path(),'ipax_url')) --}}
	<div class="exit-fullscreen-overlay" id="aus_bodymap" style="display:block;z-index:10">
		<div class="fullscreen-msg">
			<div class="fullscreen-title-wrapper"> 
				<p class="fullscreen-msg-title" style="text-align: center; color: #111; font-size:20px">聴診を開始します</p>
				<p class="fullscreen-msg-title" style="text-align: center; color: #111; font-size:20px; padding-top:0 !important">Start auscultation</p>
			</div>
			<div class="fullscreen-footer-wrapper" >
				<div class="fullscreen-btn-wrapper __ok" style="text-align: center;border:none;width:100% !important"> 
					<span class="fullscreen-btn btn-ok" style="color: #111; font-size:20px; display:block">OK</span>
				</div>
				{{-- <div class="fullscreen-btn-wrapper __cancel"  style="text-align: center">
					<span class="fullscreen-btn fullscreen-btn-cancel" style="color: #111; font-size:20px">Cancel</span>
				</div> --}}
			</div>
		</div>
	</div>
	{{-- @endif --}}
	{{-- // if user and password on combine input --}}
	{{-- @if ($name_flg == 1 && $password_flg == 1)
		<div class="exit-fullscreen-overlay" id="aus_bodymap_name" style="display:block;z-index:11;background-color:unset">
			<div class="fullscreen-msg">
				<span id="close_user_input">X</span>
				<div class="fullscreen-title-wrapper" style="padding-bottom: 20px">
					<div class="input-wrapper">
						<p class="fullscreen-msg-title input-label" style=";">Display Name</p>
						<input class="username_input" id="display_name" type="text"/>
					</div>
					<div class="input-wrapper">
						<p class="fullscreen-msg-title input-label" style="">Meeting Password</p>
						<input class="password_input" id="display_name" type="password"/>
					</div>
					
				</div>
				<div class="fullscreen-footer-wrapper" >
					<div class="fullscreen-btn-wrapper __ok" style="text-align: center;border:none;width:100% !important"> 
						<span id="btn-user-ok" class="fullscreen-btn btn-user-ok" style="color: #111; font-size:20px; display:block">OK</span>
					</div
				</div>
			</div>
		</div>
	@endif --}}

	@if ($name_flg == 1)
		<div class="exit-fullscreen-overlay" id="aus_bodymap_name" style="display:block;z-index:11;background-color:unset">
			<div class="fullscreen-msg">
				{{-- <span id="close_user_input">X</span> --}}
				<div class="fullscreen-title-wrapper" style="padding-bottom: 20px"> 
					<p class="fullscreen-msg-title" style="text-align: center; color: #111; font-size:20px">Enter your display name</p>
					<form action="">
						<input class="username_input" id="display_name" type="text" autocomplete="off"/>
					</form>
				</div>
				<div class="fullscreen-footer-wrapper" >
					<div class="fullscreen-btn-wrapper __ok" style="text-align: center;border:none;width:100% !important"> 
						<span id="btn-user-ok" class="fullscreen-btn btn-user-ok" style="color: #111; font-size:20px; display:block">OK</span>
					</div>
					{{-- <div class="fullscreen-btn-wrapper __cancel"  style="text-align: center">
						<span class="fullscreen-btn fullscreen-btn-cancel" style="color: #111; font-size:20px">Cancel</span>
					</div> --}}
				</div>
			</div>
		</div>
	@endif
	@if ($password_flg == 1)
		<div class="exit-fullscreen-overlay" id="aus_bodymap_password" style="display:block;z-index:10;background-color:unset">
			<div class="fullscreen-msg">
				{{-- <span id="close_pass_input">X</span> --}}
				<div class="fullscreen-title-wrapper" style="padding-bottom: 20px"> 
					<p class="fullscreen-msg-title" style="text-align: center; color: #111; font-size:20px">Enter the meeting password</p>
					<form action="">
						<input class="password_input" id="display_pass" type="password"/>
					</form>
					<span style="color:red;display:none" id="error-pass">password is incorrect</span>
				</div>
				<div class="fullscreen-footer-wrapper" >
					<div class="fullscreen-btn-wrapper __ok" style="text-align: center;border:none;width:100% !important"> 
						<span id="btn-pass-ok" class="fullscreen-btn btn-pass-ok" style="color: #111; font-size:20px; display:block">OK</span>
					</div>
					{{-- <div class="fullscreen-btn-wrapper __cancel"  style="text-align: center">
						<span class="fullscreen-btn fullscreen-btn-cancel" style="color: #111; font-size:20px">Cancel</span>
					</div> --}}
				</div>
			</div>
		</div>
	@endif
	<div id="live-page"></div>
	{{-- @if($heatmap_flg == 1)
		<span class="start_stop_wrapper start_wrap">
			<button id="btn-start" class="" style="color:#fff">start</button>
			<button id="btn-stop" class="" style="color:#fff; display:none">stop</button>
		</span>
	@endif --}}

	<script src="{{ asset('js/heatmap/heatmap.min.js') }}"></script>
	<script src="{{ asset('js/jitsi/external_api.js') }}"></script>
	<script>
		const domain = 'dev.jitsi.sys4tr.com';
		const room = `{{ $room }}`;
		const m_flg = `{{ $monitoring_flg }}`;
		const n_flg = `{{ $name_flg }}`;
		const p_flg = `{{ $password_flg }}`;
		let jitsi_api = null;
		let display_name = "";
		let newDate = new Date();
		$('.btn-heart, .btn-lung, .btn-pulse, .points').hide();
		if(n_flg == '0' && p_flg == '0' && m_flg == '1')
		initialize_vconf(newDate.toLocaleString("es-CL"));
		function initialize_vconf(disp_name){
			const options = {
				roomName: room,
				parentNode: document.querySelector('#live-page'),
				width: 0,
				height: 0,
			
				configOverwrite: {
					enableNoAudioDetection: false,
					enableNoisyMicDetection: false,
					startWithAudioMuted: true,
					startWithVideoMuted: true,
					enableWelcomePage: false,
					prejoinPageEnable: false,
					disableRemoteMute: true,
					hideConferenceSubject: true,
					apiLogLevels: ['error', 'info'],
					enableSaveLogs: false,
					disableDeepLinking: true,
					notifications: [],
					startScreenSharing: false
				},
				interfaceConfigOverwrite: {
					// DISABLE_DOMINANT_SPEAKER_INDICATOR: true,
					// DISABLE_JOIN_LEAVE_NOTIFICATIONS: true,
					// DISABLE_VIDEO_BACKGROUND: true,
					// DISABLE_PRESENCE_STATUS: true,
					// DISABLE_TRANSCRIPTION_SUBTITLES: true,
					// DISPLAY_WELCOME_FOOTER: true,
					// DISPLAY_WELCOME_PAGE_CONTENT: true,
					// DISPLAY_WELCOME_PAGE_TOOLBAR_ADDITIONAL_CONTENT: true,
					// RECENT_LIST_ENABLED: false,
					// SHOW_WATERMARK_FOR_GUESTS: false,
					// TOOLBAR_BUTTONS: [],
					// SETTINGS_SECTIONS: [],
					// ENFORCE_NOTIFICATION_AUTO_DISMISS_TIMEOUT: 0,
					// VIDEO_QUALITY_LABEL_DISABLED: true,
					// HIDE_INVITE_MORE_HEADER: true,
					// DISPLAY_WELCOME_PAGE_ADDITIONAL_CARD: true,
					// SHOW_BRAND_WATERMARK: false,
					// DISABLE_FOCUS_INDICATOR: true,
					// SHOW_CHROME_EXTENSION_BANNER: false,
					// DISABLE_VIDEO_BACKGROUND: true,
					// HIDE_DEEP_LINKING_LOGO: true,
					// SHOW_JITSI_WATERMARK: false,
					// VERTICAL_FILMSTRIP: false
				},
				userInfo: {
					displayName: disp_name
				}
			};
        	jitsi_api = new JitsiMeetExternalAPI(domain, options);
			setTimeout( () => {
				jitsi_api.executeCommand('toggleShareScreen');
			},3000 )
			jitsi_api.addEventListener(`videoConferenceLeft`, () => {
				setTimeout( () => {
					console.log("meeting done");
					const listener = ({ enabled }) => {
					api.removeEventListener(`tileViewChanged`, listener);
					if (!enabled) {
						jitsi_api.executeCommand(`toggleTileView`);
					}
					};
					jitsi_api.addEventListener(`tileViewChanged`, listener);
					jitsi_api.executeCommand(`toggleTileView`);
				},2000)
			});
		}
		function pauseAudio() {
			if (window.location.pathname === "/home" || window.location.pathname === "/" ) {
				//pause all audios instances in bookmark
				for (var prop in audiojs.instances) {
					audiojs.instances[prop].pause()
				}
			}
			return;
		}
		window.onbeforeunload = function() {
			return "Are you sure you want to leave?";
		};
		$('#btn-user-ok').click( (e) => {
			var user_input = $('#btn-user-ok').closest('.exit-fullscreen-overlay');
			display_name = $('#display_name').val().trim();
			user_input.hide();
			if(display_name == ""){
				user_input.show();
				$('#display_name').addClass('red-border');
			}else {
				if(m_flg !== '0'){
					if(p_flg == '0')
					initialize_vconf(display_name);
				}
			}
		});
		$("#reshare-btn").click(() => {
			$("#reshare-btn").attr("disabled", true);
			$(".reshare").css('backgroundColor','#CACACA');
			setTimeout( () => {
				$("#reshare-btn").attr("disabled", false);
				$(".reshare").css('backgroundColor','#47B8E8');
				jitsi_api.executeCommand('toggleShareScreen');
			},3000 )
		});
		$("#reshare-btn-full").click(() => {
			$("#reshare-btn-full").attr("disabled", true);
			$(".reshare_fullscreen").css('backgroundColor','#CACACA');
			setTimeout( () => {
				$("#reshare-btn-full").attr("disabled", false);
				$(".reshare_fullscreen").css('backgroundColor','#47B8E8');
				jitsi_api.executeCommand('toggleShareScreen');
			},3000 )
		});
		$(document).on('keypress',function(e) {
			// prevent submit form on enter
			if(e.which == 13) {
				e.preventDefault();
			}
		});
		$('#btn-pass-ok').click(() => {
			let pw = $('#display_pass').val();
			if(pw.trim() == ""){
				$('#display_pass').addClass("red-border");
				return false;
			}
			let urlParams = new URLSearchParams(window.location.search);
			let gid = urlParams.get('groupAdminId');
			let lib_id = $('#offline_id').data('id');
			let params = {
				pass: pw,
				gid: gid,
				lib_id: lib_id
			};
			$.ajaxSetup({
				// 普通のheaderでは駄目だったOK
				// getならこのajaxSetup自体を丸々なくせば動作する
				beforeSend: function (xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
				}
			});
			$.ajax({
				url: "/api/checkPass",
				type: "post",
				data: params,
			})
			.done(function (res) {
				if(res.length !== 0){
					$('#btn-pass-ok').closest('.exit-fullscreen-overlay').hide();
					if(m_flg !== '0'){
						display_name = n_flg == '0' ? (new Date()).toLocaleString("es-CL") : display_name;
						initialize_vconf(display_name);
					}
				}else {
					$('#error-pass').show();
					setTimeout(() => {
						$('#error-pass').hide();
					},5000)
				}
			 })
			.fail(function (jqxhr, status, error) {
				console.log("Something went wrong: ", error);
			 });
		});
	</script>