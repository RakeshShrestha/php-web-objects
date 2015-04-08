<?phpclass cController {    public $req = null;    public function __construct() {        $this->req = Request::getContext();        $pathprefix = $this->req->getPathPrefix();        $cusertype = getCurrentUserType();        if ($pathprefix == 'dashboard' && $cusertype != 'user') {            $this->redirect('main/login', 'Invalid Access');        }        if ($pathprefix == 'admin' && $cusertype != 'superadmin') {            $this->redirect('main/login', 'Invalid Access');        }    }    public function redirect($path = null, $alertmsg = null) {        if ($alertmsg) {            View::addSplashMsg($alertmsg);        }        $redir = getUrl($path);        header("Location: $redir");        exit;    }    public function display(array &$data = array(), $file = null) {        View::display($data, $file);    }}