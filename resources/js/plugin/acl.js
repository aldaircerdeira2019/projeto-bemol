const Acl = class {
  constructor(user) {
    this.user=user;
  }

  roles(){
    return  this.user.roles.map(role =>role);
  }

  hasRoleTo(string){
    return this.roles().includes(string);
  }
};

export default {Acl};
