<?php 

namespace App\Controller;

use Tool\Controller;

/**
 * About pages
 */
class AboutController extends Controller 
{
    
    // About page
    public function about()
    {
        return $this->view('/defaults/abouts/about.html.twig', []);
    }

    // Legal notice page
    public function legalNotice()
    {
        return $this->view('/defaults/abouts/legal-notice.html.twig', []);
    }

    // Policy and privacy page
    public function policyPrivacy()
    {
        return $this->view('/defaults/abouts/policy-privacy.html.twig', []);
    }


}
