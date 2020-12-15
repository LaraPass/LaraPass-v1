@extends('ui.layouts.ep')

@section('title')
Terms of Service of {{ Setting::get('app_name') }}
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-header bg-secondary">
          <div class="text-center text-muted">
            <h1><u>Terms of Service</u> of <span class="text-purple">{{ Setting::get('app_name') }}</span> </h1>
            <small>Last Updated : 
              <!-- Privacy Policy Last Updated Date -->
              <span class="text-purple">26-Jan-2019</span>
              <!-- Last Updated Date Ends -->
            </small>
          </div>
        </div>
        <div class="card-body px-lg-5 py-lg-5">
          <!-- Insert your Privacy Policy HTML markup or Plain text here -->
          
          <h3>1. Terms</h3>
          <p><strong>By accessing the website at <a href="{{ Setting::get('app_url') }}">{{ Setting::get('app_url') }}</a>, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.</strong></p>
          <h3>2. Use License</h3>
          <ol type="a">
             <li>Permission is granted to temporarily download one copy of the materials (information or software) on LaraPass' website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
             <ol type="i">
                 <li>modify or copy the materials;</li>
                 <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
                 <li>attempt to decompile or reverse engineer any software contained on LaraPass' website;</li>
                 <li>remove any copyright or other proprietary notations from the materials; or</li>
                 <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
             </ol>
              </li>
             <li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by LaraPass at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
          </ol>
          <h3>3. Disclaimer</h3>
          <ol type="a">
             <li>The materials on LaraPass' website are provided on an 'as is' basis. LaraPass makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</li>
             <li>Further, LaraPass does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</li>
          </ol>
          <h3>4. Limitations</h3>
          <p><strong>In no event shall LaraPass or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on LaraPass' website, even if LaraPass or a LaraPass authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</strong></p>
          <h3>5. Accuracy of materials</h3>
          <p><strong>The materials appearing on LaraPass' website could include technical, typographical, or photographic errors. LaraPass does not warrant that any of the materials on its website are accurate, complete or current. LaraPass may make changes to the materials contained on its website at any time without notice. However LaraPass does not make any commitment to update the materials.</strong></p>
          <h3>6. Links</h3>
          <p><strong>LaraPass has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by LaraPass of the site. Use of any such linked website is at the user's own risk.</strong></p>
          <h3>7. Modifications</h3>
          <p><strong>LaraPass may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.</strong></p>
          <h3>8. Governing Law</h3>
          <p><strong>These terms and conditions are governed by and construed in accordance with the laws of Telangana and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</strong></p>

          <!-- Privacy Policy Content Ends -->
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{ url()->previous() }}" class="text-light"><small><i class="fa fa-arrow-circle-o-left"></i> Go Back</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection