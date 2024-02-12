class Candidats {
    constructor(_objetCandidat) {
        this.id = _objetCandidat.id;
        this.nom = _objetCandidat.lastname; 
        this.prenom = _objetCandidat.firstname;
        this.slogan = _objetCandidat.slogan;
        this.photo = './assets/candidats/'+this.id+'.jpg';
    }
}

export { Candidats }