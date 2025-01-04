class Auth{
    typePass = "password";
    typeRePass = "password";
    resultId;
    
    PasswordViews(){
        this.typePass = this.typePass === "password" ? "text" : 'password';
        return this.typePass;
    }
    RePasswordViews(){
        this.typeRePass = this.typeRePass === "password" ? "text" : 'password';
        return this.typeRePass;
    }
    RandomId(){
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        const numbers = "0123456789";
        this.resultId='';
        for (let i = 0; i < 6; i++) {
          const isLetter = i % 2 === 0;
          const charSet = isLetter ? letters : numbers;
          this.resultId += charSet.charAt(Math.floor(Math.random() * charSet.length));
        }
        return this.resultId;
    }
}

