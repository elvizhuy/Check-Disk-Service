changeEvn(){
  cp .env.example .env
  echo " " >> .env
  ENV_FILE=".env"
  TEMP_FILE=".env.tmp"
   replaceLine() {
    local search=$1
    local replace=$2
    grep -v "$search" $ENV_FILE > $TEMP_FILE
    echo "$replace" >> $TEMP_FILE
    mv $TEMP_FILE $ENV_FILE
}
replaceLine "DB_CONNECTION=mysql" "DB_CONNECTION=mysql"
replaceLine "DB_PORT=3306" "DB_PORT=3306"
replaceLine "DB_HOST=127.0.0.1" "DB_HOST=10.0.0.210"
replaceLine "DB_DATABASE=checkdiskserver" "DB_DATABASE=quanlymaychu"
replaceLine "DB_USERNAME=root" "DB_USERNAME=root"
replaceLine "DB_PASSWORD=" "DB_PASSWORD=abcd@1234"
}

changeEvn
