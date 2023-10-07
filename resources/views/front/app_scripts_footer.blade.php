<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
@php
    $g_settings = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
@if($g_settings->layout_direction == 'ltr')
    <script src="{{ asset('public/frontend/js/ltr.js') }}"></script>
@endif
@if($g_settings->layout_direction == 'rtl')
    <script src="{{ asset('public/frontend/js/rtl.js') }}"></script>
@endif

@if ($errors->any())
	@php $all_error = '';  @endphp
	@foreach ($errors->all() as $error)
		@php $all_error .= $error.'<br>';  @endphp
	@endforeach
	<script>Swal.fire({icon: 'error',title: '',html: '{!! clean($all_error) !!}'})</script>
@endif

@if(session()->get('error'))
	<script>Swal.fire({icon: 'error',title: '',html: '{!! clean(session()->get('error')) !!}'})</script>
@endif

@if(session()->get('success'))
	<script>Swal.fire({icon: 'success',title: '',html: '{!! clean(session()->get('success')) !!}'})</script>
@endif

@if($g_setting->tawk_live_chat_status == 'Show')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/{{ $g_setting->tawk_live_chat_property_id }}/1fapclhaj';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@endif
