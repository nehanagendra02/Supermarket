create table designation(
desig_id int primary key,
desig_name varchar(50),
perk int);

create table Employee(
Emp_id int primary key,
desig_id int,
Name varchar(50),
Dept_name varchar(50),
join_date date,
salary int,
password int ,
leaving_date date,
foreign key (desig_id) references designation(desig_id));

create table emp_phoneno(
Emp_id int,
phoneno long,
foreign key (Emp_id) references Employee(Emp_id));

create table emp_Address(
Emp_id int,
Hno varchar(50),
Area varchar(50),
locality varchar(50),
city varchar(50),
state varchar(50),
pincode long,
foreign key(Emp_id) references Employee(Emp_id));

create table promotion(
prom_id int,
Emp_id int,
prev_desig varchar(50),
pres_desig varchar(50),
foreign key(Emp_id) references Employee(Emp_id));

create table transaction(
trans_id int primary key,
no_of_prod int,
counter int,
Act_amount int,
final_amount int);

create table customer(
cust_id int primary key,
name varchar(50),
offer int,
check (offer < 100));

create table cust_phoneno(
cust_id int ,
phoneno long,
foreign key (cust_id) references customer(cust_id));

create table cust_Address(
cust_id int,
Hno varchar(50),
Area varchar(50),
locality varchar(50),
city varchar(50),
state varchar(50),
pincode long,
foreign key(cust_id) references customer(cust_id));

create table section(
sec_id int primary key,
sect_name varchar(50),
offer int,
check (offer<100));

create table product(
prod_id int primary key,
name varchar(50),
type varchar(50),
price float,
stock int,
sec_id int,
brand_name varchar(50),
foreign key (sec_id) references section(sec_id));

create table prod_trans(
trans_id int,
prod_id int,
quantity int,
foreign key (trans_id) references transaction(trans_id),
foreign key (prod_id) references product(prod_id));

create table cust_trans(
cust_id int,
trans_id int,
foreign key (trans_id) references transaction(trans_id),
foreign key (cust_id) references customer(cust_id));

-- Triggers


delimiter //
create trigger Product_update 
after insert on prod_trans
for each row
begin
	update Transaction 
    set no_of_prod=no_of_prod+new.quantity
    where transaction.trans_id=new.trans_id;
end //
delimiter ;

 
delimiter //
create trigger setdesignation
after insert on promotion
for each row
begin
	update employee 
          set desig_id=
		(select desig_id from designation where desig_name = new.pres_desig)
    where employee.emp_id=new.emp_id;
end //
delimiter ;
