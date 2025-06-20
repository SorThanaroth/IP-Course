import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { UserModule } from './users/user.module';
import { TaskModule } from './tasks/task.module';
import { TypeOrmModule } from '@nestjs/typeorm';
import { User } from './users/user.entity';
import { Task } from './tasks/task.entity';
import { UsersService } from './users/user.service';
import { UsersController } from './users/user.controller';
@Module({
  imports: [
    TypeOrmModule.forRoot ({
      type: 'sqlite',
      database: 'todo.sqlite',
      entities: [User, Task],
      synchronize: true, 
    }),
    UserModule,
    TaskModule,
  ],
  controllers: [AppController, UsersController],
  providers: [AppService, UsersService],
})
export class AppModule {}
