namespace Jan\ProjektBundle\Controller;

class NazivDelovnegaMestaController{
    public function __construct($container, ...){
        $this->container = $container;
        // ... deal with any more arguments etc here
    }

    public function naziv($params){
        $x=$params;
	return $x;
    }

    protected function get($service)
    {
        return $this->container->get($service);
    }
}
