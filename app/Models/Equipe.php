namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = 'equipes';

    protected $fillable = [
        'nome',
        'cidade',
        'responsavel',
        'telefone',
        'email',
    ];
}
