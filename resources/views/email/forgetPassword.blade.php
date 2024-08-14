<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#F9F9F9">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			{{-- <tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<img alt="Logo" style="height: 100px" src="https://upload.wikimedia.org/wikipedia/commons/1/15/Logo_Kementerian_Perhubungan_Indonesia_%28Kemenhub%29.png" class="h-45px" />
				</td>
			</tr> --}}
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 30px; font-size: 17px;">
							<strong>Hello!, {{ $email }}</strong>
						</div>
						<div style="padding-bottom: 30px">
							You have asked to reset your password, 
							To get the password reset code, please click on the following link:
						</div>
						<div style="padding-bottom: 40px; text-align:center;">
							<a href="{{ route('reset', $token) }}" rel="noopener" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#1B84FF;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">Reset Password</a>
						</div>
						<div style="padding-bottom: 10px">This password change code will expire 2 hours from the time this email was sent</div>
						<div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>
						<div style="padding-bottom: 10px; word-wrap: break-all;">
							<p style="margin-bottom: 10px;">You can also copy and paste the link above into a new browser window, or enter the reset code directly into the password page:</p>
							<a href="{{ route('reset', $token) }}" rel="noopener" target="_blank" style="text-decoration:none;color: #1B84FF">{{ route('reset', $token) }}</a>
						</div>
						{{-- <tr>
							<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
								<p>Jl. Tuan Sigundaba, Bahapal Raya, Kec. Raya <br> Kabupaten Simalungun
								<p>Copyright ©
								<a href="https://simalungunkab.go.id/" rel="noopener" target="_blank">DISHUB Simalungun</a>.</p>
							</td>
						</tr> --}}
					</br></div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>