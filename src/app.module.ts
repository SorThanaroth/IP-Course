import { Module } from "@nestjs/common";
import { AppController } from "./app.controller";
import { AppService } from "./app.service";
import { GraphQLModule } from "@nestjs/graphql";
import { ApolloDriver, ApolloDriverConfig } from "@nestjs/apollo";
import { BookResolver } from "./modules/book/book.resolver";
import { BookModule } from "./modules/book/book.module";
import { StudentModule } from "./modules/student/student.module";
import { AttendanceModule } from "./modules/attendance/attendance.module";

@Module({
  imports: [
    GraphQLModule.forRoot<ApolloDriverConfig>({
      driver: ApolloDriver,
      playground: true,
      typePaths: ["./**/*.graphql"],
    }),
    BookResolver,
    BookModule,
    AttendanceModule,
    StudentModule,
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
