<?phprequire_once 'Service/AlunosService.class.php';require_once 'Service/InstituicaoService.class.php';require_once 'Service/MateriaInstituicaoService.class.php';require_once 'Service/MateriaTurmaService.class.php';require_once 'Service/TurmaService.class.php';#Mapeamento e Instancias dos Services class ServiceLocator {	public static function getAlunosService() {
		return new AlunosService();
	}	public static function getInstituicaoService() {		return new InstituicaoService(); 	}	public static function getMateriaService() {
		return new MateriaService();
	}	public static function getMateriaTurmaService() {
		return new MateriaTurmaService();
	}	public static function getTurmaService() {
		return new TurmaService();
	}}
?>